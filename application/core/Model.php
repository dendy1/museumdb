<?phpnamespace application\core;use application\core\Database;abstract class Model{    public $db;    public $message;    public function __construct()    {        $this->db = new Database();    }}