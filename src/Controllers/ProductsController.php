<?php
namespace Controllers;

use Authenticator;
use Database;
use Request;
use Response;

class ProductsController extends BaseController {
    protected Database $database;
    protected \SessionManager $sessionManager;

    public function __construct(Database $database, \SessionManager  $sessionManager)
    {
        $this->database = $database;
        $this->sessionManager = $sessionManager;
    }

    public function index(Request $request): Response {
        return $this->view('products');
    }

    public function search(Request $request) {
        // $searchTerm = $request->input('myInput');
        // $sql = "SELECT id, dname, price, brand, color, chip, main, graph, limage FROM header WHERE concat(dname,link,limage,chip, brand, graph, main) LIKE '%{$searchTerm}%'";
        // $stmt = $this->database->prepare($sql);
        // $stmt->execute();
        // $results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        // /* send a JSON encded array to client */
        $myObj=array("id"=>35, "dname"=>"string", "price"=>1500, "brand"=>"ags", "color"=>"sasd", "chip"=>"asdsad", "main"=>"asdsad", "graph"=>"asdsd", "limage"=>"asdjasd" );
        $results = json_encode($myObj);
        header('Content-type: application/json');
        return json_encode($results);
    }

    public function show($id) {
        return $this->view('product-details');
    }
}