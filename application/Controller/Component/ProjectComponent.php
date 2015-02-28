<?php

App::uses('Component', 'Controller');
App::uses('HttpSocket', 'Network/Http');
App::uses('API', 'Controller/Component');
App::uses('Session', 'Component');

class ProjectComponent extends Component {	
           
    private $httpSocket = null;       	 
    private $auditing = null;
    private $auth = null;    
    private $projectsString = '{"projects":[{"id":"9","title":"Whitelist","text":"","show":"0"},{"id":"8","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas \/ Suporte","text":"","show":"0"},{"id":"4","title":"Conte\u00c3\u00bado Adulto","text":"","show":"0"},{"id":"5","title":"Rob\u00c3\u00b4 Futebol Integra\u00c3\u00a7\u00c3\u00a3o no Falc\u00c3\u00a3o","text":"","show":"0"},{"id":"6","title":"Porteiras Segmentadas - Marketing Direto","text":"","show":"0"},{"id":"7","title":"Falc\u00c3\u00a3o - Migra\u00c3\u00a7\u00c3\u00a3o Rob\u00c3\u00b4s","text":"","show":"0"},{"id":"10","title":"Strike Nai","text":"","show":"0"},{"id":"11","title":"AbsLabs","text":"","show":"1"},{"id":"12","title":"Gest\u00c3\u00a3o Absoluta","text":"","show":"1"},{"id":"13","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas","text":"","show":"0"},{"id":"14","title":"Terra Espanha","text":"","show":"0"},{"id":"15","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas \/ Suporte","text":"","show":"0"},{"id":"16","title":"Azion","text":"","show":"0"},{"id":"17","title":"Keepcon","text":"","show":"0"},{"id":"18","title":"Integra\u00c3\u00a7\u00c3\u00a3o Movistar","text":"","show":"0"},{"id":"19","title":"Bonus Vendas Validas","text":"","show":"0"},{"id":"20","title":"Porteiras Segmentadas - Fase 2","text":"","show":"0"},{"id":"21","title":"Migra\u00c3\u00a7\u00c3\u00a3o parceiro de hospedagem","text":"","show":"0"},{"id":"22","title":"Elei\u00c3\u00a7\u00c3\u00b5es","text":"","show":"0"},{"id":"23","title":"SONORA: Periodicidade de Downloads","text":"","show":"0"},{"id":"24","title":"ADM","text":"","show":"0"},{"id":"25","title":"Analytics","text":"","show":"0"},{"id":"26","title":"CDN Setup","text":"","show":"0"},{"id":"28","title":"Futebol Integra\u00c3\u00a7\u00c3\u00a3o Estatisticas","text":"","show":"0"},{"id":"29","title":"Migra\u00c3\u00a7\u00c3\u00a3o Futebol Integra\u00c3\u00a7\u00c3\u00a3o","text":"","show":"0"},{"id":"30","title":"Migra\u00c3\u00a7\u00c3\u00a3o Loterias","text":"","show":"0"},{"id":"31","title":"Manuten\u00c3\u00a7\u00c3\u00a3o e Suporte","text":"","show":"0"},{"id":"32","title":"Billing","text":"","show":"0"},{"id":"33","title":"Migra\u00c3\u00a7\u00c3\u00a3o Sonora","text":"","show":"0"},{"id":"34","title":"Compatibilizar TAS no Chrome","text":"","show":"0"},{"id":"35","title":"Exclus\u00c3\u00a3o L\u00c3\u00b3gica","text":"","show":"0"},{"id":"36","title":"Aplica\u00c3\u00a7\u00c3\u00a3o TVs 1","text":"","show":"0"},{"id":"37","title":"Falc\u00c3\u00a3o Rob\u00c3\u00b4s","text":"","show":"0"},{"id":"38","title":"Manuten\u00c3\u00a7\u00c3\u00b5es QET","text":"","show":"0"},{"id":"39","title":"Auditorias","text":"","show":"1"},{"id":"40","title":"Identifica\u00c3\u00a7\u00c3\u00a3o positiva de Assinantes","text":"","show":"0"},{"id":"41","title":"Sigo Meu Time","text":"","show":"0"},{"id":"42","title":"Aplica\u00c3\u00a7\u00c3\u00a3o TVs 2","text":"","show":"0"},{"id":"43","title":"Vc Reporter","text":"","show":"0"},{"id":"44","title":"Chaveamento da Opta","text":"","show":"0"},{"id":"45","title":"NavBar PubNFS","text":"","show":"0"},{"id":"46","title":"Aplica\u00c3\u00a7\u00c3\u00a3o TVs 3","text":"","show":"0"},{"id":"47","title":"Painel de Vendas","text":"","show":"0"},{"id":"51","title":"Billing 2","text":"","show":"0"},{"id":"53","title":"Facebook Expirer","text":"","show":"0"},{"id":"54","title":"Tv Samsung - Corre\u00c3\u00a7\u00c3\u00b5es de bugs","text":"","show":"0"},{"id":"55","title":"Identifica\u00c3\u00a7\u00c3\u00a3o positiva de Assinantes - Fase 2","text":"","show":"0"},{"id":"56","title":"QET em infogr\u00c3\u00a1ficos","text":"","show":"0"},{"id":"57","title":"Migra\u00c3\u00a7\u00c3\u00a3o Rob\u00c3\u00b4 Loterias (V6)","text":"","show":"0"},{"id":"58","title":"Identifica\u00c3\u00a7\u00c3\u00a3o positiva de Assinantes - Fase 3","text":"","show":"0"},{"id":"59","title":"Painel de Vendas - Ajustes e Melhorias","text":"","show":"0"},{"id":"60","title":"Ativa\u00c3\u00a7\u00c3\u00a3o Automatica Microsoft","text":"","show":"0"},{"id":"61","title":"Aplica\u00c3\u00a7\u00c3\u00a3o Tvs 4","text":"","show":"0"},{"id":"62","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas - Infogr\u00c3\u00a1ficos","text":"","show":"0"},{"id":"63","title":"Tickets 1","text":"","show":"0"},{"id":"64","title":"Blender - Novos modulos","text":"","show":"0"},{"id":"65","title":"Configura\u00c3\u00a7\u00c3\u00a3o","text":"","show":"1"},{"id":"66","title":"Aplica\u00c3\u00a7\u00c3\u00a3o Tvs 5","text":"","show":"0"},{"id":"67","title":"App CRM-Eventos","text":"","show":"0"},{"id":"68","title":"Tickets 2","text":"","show":"0"},{"id":"70","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas - Bugs #1","text":"","show":"0"},{"id":"71","title":"Portf\u00c3\u00b3lio","text":"","show":"0"},{"id":"72","title":"Ativa\u00c3\u00a7\u00c3\u00a3o Autom\u00c3\u00a1tica Microsoft 2","text":"","show":"0"},{"id":"73","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas - TVs","text":"","show":"0"},{"id":"74","title":"Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas Trello","text":"","show":"0"},{"id":"75","title":"MPSBr","text":"","show":"0"},{"id":"76","title":"Refacturing Site","text":"","show":"0"},{"id":"77","title":"Painel de Vendas Pr\u00c3\u00a9-Pago","text":"","show":"0"},{"id":"78","title":"MUSA - Backlog priorizado","text":"","show":"0"},{"id":"79","title":"Integra\u00c3\u00a7\u00c3\u00a3o Telef\u00c3\u00b4nica","text":"","show":"0"},{"id":"80","title":"Nuvem Livros","text":"","show":"0"},{"id":"81","title":"Aluguel de Filmes - GVP","text":"","show":"0"},{"id":"82","title":"Painel de Vendas - Migrar conta REG PAG","text":"","show":"0"},{"id":"83","title":"Musa Backlog priorizado 2","text":"","show":"0"},{"id":"84","title":"Aluguel de Filmes pr\u00c3\u00a9-pago - GVP","text":"","show":"0"},{"id":"85","title":"BusPOA","text":"","show":"1"},{"id":"86","title":"CRM QRCode Reader - Analytics","text":"","show":"0"},{"id":"87","title":"Prospec\u00c3\u00a7\u00c3\u00a3o de Clientes","text":"","show":"1"},{"id":"88","title":"Calend\u00c3\u00a1rio Esportes","text":"","show":"0"},{"id":"89","title":"Calend\u00c3\u00a1rio Esportes - Parte 2","text":"","show":"0"},{"id":"90","title":"Suspens\u00c3\u00a3o de Pr\u00c3\u00a9-Pagos","text":"","show":"0"},{"id":"91","title":"2014 - Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas Painel","text":"","show":"0"},{"id":"92","title":"2014 - Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas SGTEC","text":"","show":"0"},{"id":"93","title":"2014 - Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas SUAT","text":"","show":"0"},{"id":"94","title":"2014 - Publicidades - PORTAL","text":"","show":"0"},{"id":"95","title":"2014 - Musa - Plataforma Esportiva - PORTAL","text":"","show":"0"},{"id":"96","title":"2014 - Planejamento - PORTAL","text":"","show":"1"},{"id":"97","title":"2014 - Esportes - PORTAL","text":"","show":"0"},{"id":"98","title":"Doctor POA","text":"","show":"1"},{"id":"99","title":"2014 - Nova Capa","text":"","show":"0"},{"id":"100","title":"2014 - Barra Terra - PORTAL","text":"Atividades relativas \u00c3\u00a0 Barra Terra e demais integra\u00c3\u00a7\u00c3\u00b5es com m\u00c3\u00addias sociais como o Google +","show":"0"},{"id":"101","title":"2014 - Chat - * Connection #1 to host dsv.absoluta.net left intact PORTAL","text":"Atividades relacionadas ao servi\u00c3\u00a7o de Chat.","show":"0"},{"id":"102","title":"2014 - Manuten\u00c3\u00a7\u00c3\u00b5es Evolutivas HPSAN","text":"","show":"0"},{"id":"103","title":"Pr\u00c3\u00a9-pago parcelado renov\u00c3\u00a1vel","text":"","show":"0"},{"id":"104","title":"2014 - Disco Virtual","text":"Atividade relativas ao produto de Disco Virtual","show":"0"},{"id":"105","title":"2014 - Novo Coment\u00c3\u00a1rios","text":"Novos coment\u00c3\u00a1rios para o conte\u00c3\u00bado do Portal Novo.","show":"0"},{"id":"106","title":"2014 - Short Time Projects - Regras de Senha","text":"","show":"0"},{"id":"107","title":"App Marfrig","text":"","show":"0"},{"id":"108","title":"2014 - Formula 1","text":"","show":"0"},{"id":"109","title":"2014 - Vulnerabilidades FAQ","text":"","show":"0"}],"page":1,"pages":2,"messages":[]}';
	public $cookies = null;	
	public $API = null;		

    
    public function __construct(ComponentCollection $collection, $settings = array()) {		    	
    	$this->httpSocket = new HttpSocket();
    	$this->auditing = ClassRegistry::init('Auditing');
		$this->API = new APIComponent($collection);
		$this->auth = new AuthComponent($collection);
		$this->cookies = $this->auth->user('cookie');				
    }        
    
    private function format($responseData = null, $callback = null) {
    	if (isset($responseData)) {
    		$responseData = json_decode($responseData, true);    		
    		if (array_key_exists('projects', $responseData)) {    			    			
    			$projects = $responseData['projects'];    		
    			foreach ($projects as &$project) {    				    			
    				$project = $this->formatFields($project);    				
    			}    			    			
    			    			
    			return $projects;
    		} else {
    			$project = $responseData['project'];
    			$project = $this->formatFields($project);    			
    			
    			return $project;
    		}
    	}
    }

    private function formatFields($project = null) {
    	if (isset($project)) {    		
	    	$project['title'] = utf8_decode($project['title']);
	    	$project['managed'] = $this->exists($project['id']);        	
    	}    	
    	
    	return $project;
    }
    
    public function exists($id = null) {
    	$project = $this->auditing->find(
    			'first',
    			array(
    					'fields' => "Auditing.project_id",
    					'conditions' => array('project_id' => $id)
    			 ));
    	
    	return !empty($project);
    }
    
    public function getAll() {    	    
    	$httpSocketResponse = $this->httpSocket->get(
    			$this->API->getURL('GET_ACTIVE_PROJECTS'),
    			array(),
    			array('cookies' => $this->cookies)
    	);                	

        return $this->format($this->projectsString);
    	return $this->format($httpSocketResponse->body());    	
    }
    
    public function getById($id = null) {    
		$httpSocketResponse = $this->httpSocket->get(
				$this->API->getURL('GET_PROJECT_BY_ID', array('id' => $id)),
				array(),
				array('cookies' => $this->cookies)
		);

        $projects = $this->format($this->projectsString);
        foreach ($projects as $project) {
            if ($project['id'] == $id) {
                return $project;
            }
        }
        
        
		
		return $this->format($httpSocketResponse->body());
    }
}
