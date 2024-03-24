<?php
/**
 * Une classe PHP permet de regrouper des fonctions et des données en un seul objet.
 * 
 * Dans ce cas, nous avons une classe AirTable qui nous permet d'interagir avec l'API Airtable.
 * 
 * Cette classe contient des méthodes pour récupérer des enregistrements de la base de données Airtable.
 * Elle utilise cURL pour effectuer des requêtes HTTP à l'API Airtable.
 * 
 * Pour en savoir plus sur les classes en PHP, consultez la documentation officielle :
 * https://www.php.net/manual/fr/language.oop5.php
 * 
 * Pour en savoir plus sur cURL en PHP, consultez la documentation officielle :
 * https://www.php.net/manual/fr/book.curl.php
 * 
 * Pour en savoir plus sur l'API Airtable, consultez la documentation officielle :
 * https://airtable.com/api
 */
class AirTable
{
    /**
     * On définit les propriétés de la classe AirTable.
     *
     * Commençons par la clé API de l'API Airtable.
     * Cette clé est utilisée pour authentifier les requêtes à l'API.
     * Elle est spécifique à chaque utilisateur et doit être gardée secrète.
     * 
     * Pour obtenir votre clé API, rendez-vous sur votre compte Airtable et générez une clé API.
     * https://airtable.com/account
     */
    private $apiKey = 'patQAgcKhn7TrZTAU.79578c6f5bf3b64bf34c050a09a22a8ffa9ded20477ea5056ae049e621367c68';
    /**
     * L'ID de la base de données Airtable.
     * Cet ID est utilisé pour identifier la base de données à laquelle accéder.
     * 
     * Pour obtenir l'ID de votre base de données, rendez-vous sur votre compte Airtable et copiez l'ID de la base de données.
     * Vous le trouverez dans l'URL de votre base de données.
     */
    private $baseId;
    /**
     * L'ID ou le nom de la table dans la base de données.
     * Cet ID ou nom est utilisé pour identifier la table à laquelle accéder.
     * 
     * Pour obtenir l'ID de votre table, rendez-vous sur votre compte Airtable et copiez l'ID de la table.
     * Vous le trouverez dans l'URL de votre table.
     */
    private $tableIdOrName;

    /**
     * L'ID de l'enregistrement à récupérer.
     * Cet ID est utilisé pour identifier l'enregistrement à récupérer.
     * 
     * Pour obtenir l'ID de votre enregistrement, rendez-vous sur votre compte Airtable et copiez l'ID de l'enregistrement.
     * Vous le trouverez dans l'URL de votre enregistrement en ouvrant l'enregistrement.
     */
    private $recordId;

    /**
     * Le constructeur de la classe AirTable.
     * Un constructeur est une méthode spéciale qui est appelée automatiquement lorsqu'un objet est instancié.
     * 
     * Le constructeur prend deux paramètres : l'ID de la base de données et l'ID ou le nom de la table.
     * Ces paramètres sont utilisés pour initialiser les propriétés de la classe.
     * ici, on initialise les propriétés $baseId et $tableIdOrName avec les valeurs des paramètres.
     * 
     * Notez que `$this->` est utilisé pour accéder aux propriétés de la classe. 
     * Plus précisément, `$this->` est utilisé pour accéder à l'instance de la classe elle-même.
     * 
     * Chaque fois que vous faite un `new AirTable()`, le constructeur est appelé et crée une nouvelle instance de la classe AirTable.
     * Alors `$this->` fait référence à cette instance de la classe.
     * 
     * @param string $baseId L'ID de la base de données Airtable.
     * @param string $tableIdOrName L'ID ou le nom de la table dans la base de données.
     */
    public function __construct(string $baseId, string $tableIdOrName)
    {
        $this->baseId = $baseId;
        $this->tableIdOrName = $tableIdOrName;
    }

    /**
     * Récupère un enregistrement de la table spécifiée.
     * 
     * Cette méthode fait une requête GET à l'API Airtable et renvoie l'enregistrement spécifié par son ID.
     * L'enregistrement est renvoyé sous forme d'objet PHP standard avec des propriétés `id` et `fields`.
     * 
     * @param string $recordId L'ID de l'enregistrement à récupérer.
     * @return stdClass Un objet avec des propriétés `id` et `fields`.
     * @throws Exception Si une erreur se produit lors de la requête à l'API.
     */
    public function getRecords(string $recordId = null): stdClass 
    {
        $records = $this->callAPI("https://api.airtable.com/v0/{$this->baseId}/{$this->tableIdOrName}/{$recordId}");
        return $records;
    }

    /**
     * Récupère tous les enregistrements de la table spécifiée.
     *
     * Cette méthode fait une requête GET à l'API Airtable et renvoie tous les enregistrements de la table spécifiée.
     * Les enregistrements sont renvoyés sous forme d'objet PHP standard avec une propriété `records` qui est un tableau d'enregistrements.
     * Chaque enregistrement est un objet avec des propriétés `id` et `fields`.
     *
     * @return stdClass Un objet avec une propriété `records` qui est un tableau d'enregistrements.
     * @throws Exception Si une erreur se produit lors de la requête à l'API.
     */
    public function getAllRecords(): stdClass
    {
        $allRecords = $this->callAPI("https://api.airtable.com/v0/{$this->baseId}/{$this->tableIdOrName}");
        return $allRecords;
    }

    /**
     * Formate une date au format 'd/m/Y'.
     *
     * Cette méthode prend une date au format ISO 8601 et la formate au format 'd/m/Y'.
     *
     * @param string $date La date à formater.
     * @return string La date formatée au format 'd/m/Y'.
     */
    public function formatDate($date, $format = 'd/m/Y') {
        $date = new DateTime($date);
        return $date->format($format);
    }

    /**
     * Effectue une requête à l'API Airtable.
     *
     * Cette méthode utilise cURL pour effectuer une requête HTTP à l'API Airtable. Elle prend en charge les méthodes GET, POST, PUT, PATCH et DELETE.
     * Les données pour les requêtes POST, PUT et PATCH peuvent être fournies avec le paramètre $data.
     * 
     * Si nous créons une methode dédiée à l'appel de l'API, nous pouvons réutiliser cette méthode pour toutes les requêtes.
     * Comme par exemple pour récupérer tous les enregistrements ou un seul enregistrement. (voir getAllRecords() et getRecords() plus haut).
     * Cela permet de garder notre code propre et de ne pas répéter le code.
     * 
     * Notez que cette méthode est privée, ce qui signifie qu'elle ne peut être appelée que depuis l'intérieur de la classe.
     * Cela permet de protéger la méthode et de s'assurer qu'elle n'est pas utilisée en dehors de la classe.
     *
     * @param string $url L'URL de l'API à laquelle faire la requête.
     * @param string $method La méthode HTTP à utiliser pour la requête. Par défaut, 'GET'.
     * @param mixed $data Les données à envoyer avec la requête. Utilisé pour les requêtes POST, PUT et PATCH.
     * @return mixed Les données renvoyées par l'API, sous forme d'objet PHP standard.
     * @throws Exception Si une erreur se produit lors de la requête à l'API.
     */
    private function callAPI(string $url, string $method = 'GET', $data = null)
    {
        /**
         * Initialisation de cURL.
         */
        $curl = curl_init();

        /**
         * Configuration de cURL.
         * Nous configurons l'URL, la méthode, les en-têtes et les données de la requête.
         * Nous utilisons l'option CURLOPT_CAINFO pour spécifier le certificat SSL à utiliser.
         * Nous utilisons l'option CURLOPT_RETURNTRANSFER pour demander à cURL de renvoyer le résultat de la requête au lieu de l'afficher.
         * Nous utilisons l'option CURLOPT_CUSTOMREQUEST pour spécifier la méthode de la requête.
         * Nous utilisons l'option CURLOPT_TIMEOUT pour spécifier le délai d'attente de la requête.
         * Nous utilisons l'option CURLOPT_HTTPHEADER pour spécifier les en-têtes de la requête.
         */
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_CAINFO => "../airtable.com.cer",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer {$this->apiKey}"
            )
        ));

        /**
         * Si la méthode est POST, PUT ou PATCH, nous configurons les données à envoyer avec la requête.
         * Nous utilisons l'option CURLOPT_POSTFIELDS pour spécifier les données à envoyer avec la requête.
         */
        if ($data) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }

        /**
         * Enfin, nous exécutons la requête cURL et récupérons le résultat.
         */
        $result = curl_exec($curl);
        
        /**
         * Gestion des erreurs.
         * 
         * Si une erreur se produit lors de la requête, nous lançons une exception.
         * Sinon, nous vérifions le code de statut HTTP de la réponse.
         * Si le code de statut est 200, nous renvoyons les données sous forme d'objet PHP standard.
         * Sinon, nous lançons une exception avec le code de statut HTTP.
         */
        if ($result === false) {
            throw new Exception('Error: Un problème est survenu lors de la récupération des données.');
        } else {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if ($httpCode === 200) {
                $result = json_decode($result);
            } else {
                throw new Exception('Error: ' . $httpCode . ' - nous ne trouvons pas les données que vous recherchez.');
            }
        }

        /**
         * On ferme la session cURL.
         */
        curl_close($curl);

        /**
         * Et enfin, on renvoie les données.
         * Ces données sont renvoyées sous forme d'objet PHP standard et pourront être utilisées dans notre code.
         * 
         * exemple d'utilisation:
         * $result = $airtable->getRecords($recordId);
         */
        return $result;
    }
}