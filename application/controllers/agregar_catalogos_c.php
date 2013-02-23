<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * 
    Copyright 2013, i(dh)eas, Litigio Estratégico en Derechos Humanos A.C


    This file is part of bd(i).

    bd(i) is free software: you can redistribute it and/or modify


    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    bd(i) is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with bd(i). If not, see <http://www.gnu.org/licenses/>.


	 * */

class Agregar_catalogos_c extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('file', 'url'));
        
		$this->load->library('session');
        
		$this->is_logged_in();
		
        $this->load->model('agregar_catalogos_m');
        
    }
    
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
	}
	
    public function index(){
    	
        $this->cAgregarCatalogoDeOcupaciones();
        
        $this->cAgregarCatalogoGruposIndigenas();
        
        $this->cAgregarCatalogosLugares();
        
        $this->cAgregarCatalogosTipoDeIntervencion();
       
        $this->cAgregarCatalogosTipoPerpetrador();
		
		$this->cAgregarDerechosCatalogos();
		
		$this->cAgregarActosCatalogos();
       
        $this->cAgregarCatalogoEstatusDeLaVictima();
       
        $this->cAgregarCatalogoEstatusDelPerpetrador();
        
        $this->cAgregarCatalogoNivelDeConfiabilidad();
        
        $this->cAgregarCatalogoTipoDeFuente();
        
        $this->cAgregarCatalogoTipoDeActorColectivo();
        
        $this->cAgregarEstadoCivilCatalogo();
        
        $this->cAgregarCatalogoRelacionEntreActores();
        
        $this->cAgregarCatalogoDeNacionalidades();
        
        $this->cAgregarCatalogoNivelEscolaridad();
        
        $this->cAgregarCatalogoTipoDeDireccion();
		
		$this->cAgregarCatalogoGradoInvolucramientoN1();
		
		$this->cAgregarCatalogoGradoInvolucramientoN2();
		
		$this->cAgregarCatalogoMotivoViaje();
        
		$this->cAgregarCatalogoActosDerechoAfectado();
		
		$this->cAgregarCatalogoTipoLugarN1();
		
		$this->cAgregarCatalogoTipoLugarN2();
		
		$this->cAgregarCatalogoTipoLugarN3();
		
		$this->cAgregarCatalogoTipoRelacionCasos();
		
		$this->cAgregarCatalogoTipoFuenteDocumentalN1();
		
		$this->cAgregarCatalogoTipoFuenteDocumentalN2();

		
		$this->cAgregarActosCatalogo();
		$this->cAgregarActosCatalogoN3();

		$this->cAgregarActosCatalogoN4();
		$this->cAgregarActosCatalogoN41();
    }
    
    /*
     * @name: Agrega los catalogos de derechos afectados
     * @param: no_aplica
     * @descripcion: Esta función agrega el catalogo de paises a la bse de datos.
     * 
     */
    
    public function cAgregarEstadoCivilCatalogo(){
        
        $estadoCivil['estadoCivil'][1] = array('estadoCivilId' => 1, 'descripcion' => 'Soltero');
        
        $estadoCivil['estadoCivil'][2] = array('estadoCivilId' => 2, 'descripcion' => 'Casado');
        
        $estadoCivil['estadoCivil'][3] = array('estadoCivilId' => 3, 'descripcion' => 'Viudo');
        
        $estadoCivil['estadoCivil'][4] = array('estadoCivilId' => 4, 'descripcion' => 'Separado');
        
        $estadoCivil['estadoCivil'][5] = array('estadoCivilId' => 5, 'descripcion' => 'Divorciado');
        
        $estadoCivil['estadoCivil'][6] = array('estadoCivilId' => 6, 'descripcion' => 'En Unión Libre');
        
        $estadoCivil['estadoCivil'][7] = array('estadoCivilId' => 7, 'descripcion' => 'Con Compañero');
        
        $estadoCivil['estadoCivil'][8] = array('estadoCivilId' => 8, 'descripcion' => 'En Sociedad De Convivencia');
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estadoCivil);
        
        echo 'Catalogos de estados civiles insertados exitosamente<br />';
        
    }

	public function cAgregarActosCatalogo(){
		
		$actoN3Catalogo['actosN3Catalogo'][1]=array('actoN3Id' =>1,'descripcion'=>'Desaparición forzada','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][2]=array('actoN3Id' =>2,'descripcion'=>'Ejecución','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][3]=array('actoN3Id' =>3,'descripcion'=>'Ejecución judicial por aplicación de la pena de muerte','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][4]=array('actoN3Id' =>4,'descripcion'=>'Genocidio','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][5]=array('actoN3Id' =>5,'descripcion'=>'Masacre','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][6]=array('actoN3Id' =>6,'descripcion'=>'Muerte bajo custodia','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][7]=array('actoN3Id' =>7,'descripcion'=>'Muerte en contexto de operaciones militares','actosN2Catalogo_actoN2Id' =>1,'notas' =>'Excepto los operativos militares de seguridad pública');
		$actoN3Catalogo['actosN3Catalogo'][8]=array('actoN3Id' =>8,'descripcion'=>'Muerte en contexto de operativos de seguridad pública','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][9]=array('actoN3Id' =>9,'descripcion'=>'Muerte resultado de negligencia','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][10]=array('actoN3Id' =>10,'descripcion'=>'Muerte resultado de otras VDH','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][11]=array('actoN3Id' =>11,'descripcion'=>'Muerte sospechosa','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][12]=array('actoN3Id' =>12,'descripcion'=>'Muerte violenta','actosN2Catalogo_actoN2Id' =>1,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][13]=array('actoN3Id' =>13,'descripcion'=>'Agresión sexual','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][14]=array('actoN3Id' =>14,'descripcion'=>'Agresiones físicas','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][15]=array('actoN3Id' =>15,'descripcion'=>'Hostigamiento sexual','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][16]=array('actoN3Id' =>16,'descripcion'=>'Intento de violación sexual','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][17]=array('actoN3Id' =>17,'descripcion'=>'Intimidación','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][18]=array('actoN3Id' =>18,'descripcion'=>'Tortura','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][19]=array('actoN3Id' =>19,'descripcion'=>'Tratos crueles, inhumanos o degradantes','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][20]=array('actoN3Id' =>20,'descripcion'=>'Uso desproporcionado o indebido de la fuerza pública','actosN2Catalogo_actoN2Id' =>2,'notas' =>'Se utiliza independientemente de si el uso de la fuerza es justificado o no, legal o no, cuando este uso de la fuerza es desproporcionado (cuando no es proporcional a lo estrictamente necesario). La utilización de la fuerza debe ser una medida excepcional. Cfr. Código de conducta para funcionarios encargados de hacer cumplir la ley. Adoptado por la Asamblea General en su resolución 34/169, de 17 de diciembre de 1979');
		$actoN3Catalogo['actosN3Catalogo'][21]=array('actoN3Id' =>21,'descripcion'=>'Deportación a un lugar en el que se pueda sufrir violaciones a derechos humanos','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][22]=array('actoN3Id' =>22,'descripcion'=>'Violación sexual','actosN2Catalogo_actoN2Id' =>2,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][23]=array('actoN3Id' =>23,'descripcion'=>'Arraigo','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][24]=array('actoN3Id' =>24,'descripcion'=>'Arresto domiciliario','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][25]=array('actoN3Id' =>25,'descripcion'=>'Detención arbitraria o ilegal','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][26]=array('actoN3Id' =>26,'descripcion'=>'Encarcelamiento arbitrario','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][27]=array('actoN3Id' =>27,'descripcion'=>'Reclutamiento forzoso','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][28]=array('actoN3Id' =>28,'descripcion'=>'Redada','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][29]=array('actoN3Id' =>29,'descripcion'=>'Revisión irregular o arbitraria','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][30]=array('actoN3Id' =>30,'descripcion'=>'Secuestro','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][31]=array('actoN3Id' =>31,'descripcion'=>'Toque de queda','actosN2Catalogo_actoN2Id' =>3,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][32]=array('actoN3Id' =>32,'descripcion'=>'Esclavitud','actosN2Catalogo_actoN2Id' =>4,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][33]=array('actoN3Id' =>33,'descripcion'=>'Prostitución forzada','actosN2Catalogo_actoN2Id' =>4,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][34]=array('actoN3Id' =>34,'descripcion'=>'Servidumbre','actosN2Catalogo_actoN2Id' =>4,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][35]=array('actoN3Id' =>35,'descripcion'=>'Trabajo forzoso','actosN2Catalogo_actoN2Id' =>4,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][36]=array('actoN3Id' =>36,'descripcion'=>'Tráfico de personas','actosN2Catalogo_actoN2Id' =>4,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][37]=array('actoN3Id' =>37,'descripcion'=>'Trata de personas','actosN2Catalogo_actoN2Id' =>4,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][40]=array('actoN3Id' =>40,'descripcion'=>'Violaciones al derecho a ser comunicado(a)s con las autoridades consulares de su Estado en caso de ser detenido(a)s','actosN2Catalogo_actoN2Id' =>5,'notas' =>'Violaciones a los derechos humanos y violación al derecho internacional');
		$actoN3Catalogo['actosN3Catalogo'][53]=array('actoN3Id' =>53,'descripcion'=>'Derecho a un tribunal independiente e imparcial','actosN2Catalogo_actoN2Id' =>6,'notas' =>'Violaciones a los derechos humanos y violación al derecho internacional');
		$actoN3Catalogo['actosN3Catalogo'][60]=array('actoN3Id' =>60,'descripcion'=>'Extradición','actosN2Catalogo_actoN2Id' =>6,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][70]=array('actoN3Id' =>70,'descripcion'=>'Extorsión','actosN2Catalogo_actoN2Id' =>11,'notas' =>'Aplica a situaciones donde la autoridad o particulares utilizan de forma arbitraria o injustificada el poder (ya sea económico, político, etc.) que legalmente poseen. No se trata de actos ilegales, sino de que empleando sus facultades, las utilizan arbitrariamente, ejerciendo acciones innecesarias, intimidatorias con una gran carga de discrecionalidad. Ej. El caso del General Gallardo, al cual se le abrieron 13 averiguaciones previas, cada una después de una exoneración de la anterior. No puede hablarse de acciones ilegales, pero sí arbitrarias y discrecionales, con una intencionalidad de castigar. Otro ejemplo son los operativos injustificados o arbitrarios, que nuevamente no son ilegales porque la autoridad tiene facultades para realizar operativos, pero cuando se hacen sin causa que amerite el operativo, como denuncias específicas o pruebas de que es necesario el operativo, causan molestia a la población y pueden ser utilizados para intimidar a comunidades');
		$actoN3Catalogo['actosN3Catalogo'][71]=array('actoN3Id' =>71,'descripcion'=>'Allanamiento','actosN2Catalogo_actoN2Id' =>15,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][72]=array('actoN3Id' =>72,'descripcion'=>'Cateo','actosN2Catalogo_actoN2Id' =>15,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][73]=array('actoN3Id' =>73,'descripcion'=>'Injerencias arbitrarias e ilegales en el domicilio','actosN2Catalogo_actoN2Id' =>15,'notas' =>'Incluye injerencias arbitrarias e ilegales en comunidades');
		$actoN3Catalogo['actosN3Catalogo'][74]=array('actoN3Id' =>74,'descripcion'=>'Violación a la confidencialidad de las comunicaciones','actosN2Catalogo_actoN2Id' =>16,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][75]=array('actoN3Id' =>75,'descripcion'=>'Violación a la correspondencia','actosN2Catalogo_actoN2Id' =>16,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][76]=array('actoN3Id' =>76,'descripcion'=>'Censura','actosN2Catalogo_actoN2Id' =>17,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][77]=array('actoN3Id' =>77,'descripcion'=>'Restricciones para publicar o difundir información','actosN2Catalogo_actoN2Id' =>17,'notas' =>'Ej. Recolectar o comprar todos los ejemplares de un periódico o una revista evitando el acceso a la misma');
		$actoN3Catalogo['actosN3Catalogo'][78]=array('actoN3Id' =>78,'descripcion'=>'Negación de la existencia de información','actosN2Catalogo_actoN2Id' =>18,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][79]=array('actoN3Id' =>79,'descripcion'=>'Retención de información','actosN2Catalogo_actoN2Id' =>18,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][85]=array('actoN3Id' =>85,'descripcion'=>'Bloqueo de vías de comunicación','actosN2Catalogo_actoN2Id' =>22,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][86]=array('actoN3Id' =>86,'descripcion'=>'Retenes','actosN2Catalogo_actoN2Id' =>22,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][92]=array('actoN3Id' =>92,'descripcion'=>' Alto número de alumnos por maestro                                                                                                                                            ','actosN2Catalogo_actoN2Id' =>35,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][93]=array('actoN3Id' =>93,'descripcion'=>' Ubicación de la escuela a gran distancia de la casa del o la estudiante                                                                                                       ','actosN2Catalogo_actoN2Id' =>35,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][94]=array('actoN3Id' =>94,'descripcion'=>' Condiciones inadecuadas de escuelas y salones de clase                                                                                                                        ','actosN2Catalogo_actoN2Id' =>35,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][95]=array('actoN3Id' =>95,'descripcion'=>' Cuotas escolares prohibitivas                                                                                                                                                 ','actosN2Catalogo_actoN2Id' =>35,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][96]=array('actoN3Id' =>96,'descripcion'=>' Negación del tratamiento adecuado                                                                                                                                             ','actosN2Catalogo_actoN2Id' =>36,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][97]=array('actoN3Id' =>97,'descripcion'=>' Atención primaria de salud no proporcionada a comunidades específicas                                                                                                         ','actosN2Catalogo_actoN2Id' =>36,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][98]=array('actoN3Id' =>98,'descripcion'=>' Negación de subsidio a los servicios para personas que no pueden pagar la atención primaria a la salud                                                                        ','actosN2Catalogo_actoN2Id' =>36,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][99]=array('actoN3Id' =>99,'descripcion'=>' Costos prohibitivos de la atención médica                                                                                                                                     ','actosN2Catalogo_actoN2Id' =>36,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][102]=array('actoN3Id' =>102,'descripcion'=>' Falta de oportunidades de empleo                                                                                                                                              ','actosN2Catalogo_actoN2Id' =>37,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][103]=array('actoN3Id' =>103,'descripcion'=>' Expropiación arbitraria de la vivienda                                                                                                                                        ','actosN2Catalogo_actoN2Id' =>38,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][104]=array('actoN3Id' =>104,'descripcion'=>' Destrucción de vivienda                                                                                                                                                       ','actosN2Catalogo_actoN2Id' =>38,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][105]=array('actoN3Id' =>105,'descripcion'=>' Negación de escrituras de vivienda                                                                                                                                            ','actosN2Catalogo_actoN2Id' =>38,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][106]=array('actoN3Id' =>106,'descripcion'=>' Desalojos forzosos o ilegales                                                                                                                                                 ','actosN2Catalogo_actoN2Id' =>38,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][107]=array('actoN3Id' =>107,'descripcion'=>' Exposición a sustancias peligrosas                                                                                                                                            ','actosN2Catalogo_actoN2Id' =>41,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][108]=array('actoN3Id' =>108,'descripcion'=>' Contaminación                                                                                                                                                                 ','actosN2Catalogo_actoN2Id' =>41,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][112]=array('actoN3Id' =>112,'descripcion'=>' Robo                                                                                                                                                                          ','actosN2Catalogo_actoN2Id' =>46,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][113]=array('actoN3Id' =>113,'descripcion'=>' Expropiación arbitraria                                                                                                                                                       ','actosN2Catalogo_actoN2Id' =>46,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][114]=array('actoN3Id' =>114,'descripcion'=>' Negación de título de propiedad de la tierra                                                                                                                                  ','actosN2Catalogo_actoN2Id' =>46,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][121]=array('actoN3Id' =>121,'descripcion'=>' Violaciones al derecho de los y las trabajadore(a)s la negociación colectiva                                                                                                  ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][125]=array('actoN3Id' =>125,'descripcion'=>' Negación de indemnización por despido injustificado                                                                                                                           ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][126]=array('actoN3Id' =>126,'descripcion'=>' Despido injustificado                                                                                                                                                         ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][127]=array('actoN3Id' =>127,'descripcion'=>' Negación de vacaciones periódicas con goce de sueldo                                                                                                                          ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][128]=array('actoN3Id' =>128,'descripcion'=>' Negación del descanso, del tiempo libre y de la limitación razonable de la jornada laboral                                                                                    ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'');
		$actoN3Catalogo['actosN3Catalogo'][129]=array('actoN3Id' =>129,'descripcion'=>' No pago de salarios                                                                                                                                                           ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'');
		
		$this->agregar_catalogos_m->mAgregarDerechosCatalogos($actoN3Catalogo);
		echo 'Catalogos de actosN3 parte 1 ingresados correctamente<br />';
	}

	public function cAgregarActosCatalogoN3(){
		
		$actoN31Catalogo['actosN3Catalogo'][38]=array('actoN3Id' =>38,'descripcion'=>'Violaciones al derecho a examinar testigo(a)s o peritos (careos)','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>1);
		$actoN31Catalogo['actosN3Catalogo'][39]=array('actoN3Id' =>39,'descripcion'=>'Violaciones al derecho a hallarse presente en el proceso','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>2);
		$actoN31Catalogo['actosN3Catalogo'][41]=array('actoN3Id' =>41,'descripcion'=>'Violaciones al derecho a ser informado del cambio en su situación jurídica','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>4);
		$actoN31Catalogo['actosN3Catalogo'][42]=array('actoN3Id' =>42,'descripcion'=>'Violaciones al derecho a un juicio público','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>6);
		$actoN31Catalogo['actosN3Catalogo'][43]=array('actoN3Id' =>43,'descripcion'=>'Violaciones al derecho de audiencia en caso de expulsión','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>7);
		$actoN31Catalogo['actosN3Catalogo'][44]=array('actoN3Id' =>44,'descripcion'=>'Expulsión','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>7);
		$actoN31Catalogo['actosN3Catalogo'][45]=array('actoN3Id' =>45,'descripcion'=>'Violaciones a los derechos de lo(a)s acusado(a)s','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>8);
		$actoN31Catalogo['actosN3Catalogo'][46]=array('actoN3Id' =>46,'descripcion'=>'Violaciones al derecho a una defensa adecuada','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>9);
		$actoN31Catalogo['actosN3Catalogo'][47]=array('actoN3Id' =>47,'descripcion'=>'Igualdad entre las partes (Principio de)','actosN2Catalogo_actoN2Id' =>5,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>10);
		$actoN31Catalogo['actosN3Catalogo'][48]=array('actoN3Id' =>48,'descripcion'=>'Violaciones al derecho al debido procedimiento de solicitud de refugio','actosN2Catalogo_actoN2Id' =>5,'notas' =>'Los solicitantes de refugio deben contar con plenas salvaguardas
		procedimentales, así como garantías en todas sus etapas. 
		Dado que la decisión sobre la solicitud de asilo afecta los derechos fundamentales del individuo y una decisión errónea tiene graves consecuencias, las
		garantías procesales son un elemento esencial en los procedimientos de
		determinación del estatuto de refugiado. Las salvaguardas esenciales que deben estar disponibles para todos los solicitantes a lo largo del proceso
		incluyen:

		• a) Acceso a la información, en un idioma comprensible para el solicitante, sobre la naturaleza del proceso, así como sus derechos y
		obligaciones durante el procedimiento.
		• b) La posibilidad de entrar en contacto con el ACNUR o con otras entidades o personas (las ONG, abogados, etc.) que le den asesoría sobre el procedimiento o
		representación legal. En aquellos casos en que la asistencia legal
		gratuita esté disponible, los solicitantes de asilo deben tener acceso a
		ella.
		• c)  Ayuda de intérpretes calificados e imparciales, en caso de ser
		necesario.
		 Además, todos los solicitantes de asilo cuyas solicitudes sean
		declaradas como no 
		admisibles o rechazadas deben tener derecho a, por lo menos, una apelación o revisión completa de parte de un cuerpo independiente de la autoridad que tomó la decisión en primera instancia, así como el derecho de permanecer en el país mientras dure el proceso de apelación.
		','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>11);
		$actoN31Catalogo['actosN3Catalogo'][49]=array('actoN3Id' =>49,'descripcion'=>'Derecho a presentar pruebas','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>12);
		$actoN31Catalogo['actosN3Catalogo'][50]=array('actoN3Id' =>50,'descripcion'=>'Derecho a un juicio expedito','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>13);
		$actoN31Catalogo['actosN3Catalogo'][51]=array('actoN3Id' =>51,'descripcion'=>'Derecho a un recurso efectivo','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>14);
		$actoN31Catalogo['actosN3Catalogo'][52]=array('actoN3Id' =>52,'descripcion'=>'Derecho a un tribunal competente','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>15);
		$actoN31Catalogo['actosN3Catalogo'][54]=array('actoN3Id' =>54,'descripcion'=>'Derecho a un(a) fiscal imparcial y objetivo(a)','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>17);
		$actoN31Catalogo['actosN3Catalogo'][55]=array('actoN3Id' =>55,'descripcion'=>'Derecho al acceso al expediente administrativo','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>18);
		$actoN31Catalogo['actosN3Catalogo'][56]=array('actoN3Id' =>56,'descripcion'=>'Derecho de apelación','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>19);
		$actoN31Catalogo['actosN3Catalogo'][57]=array('actoN3Id' =>57,'descripcion'=>'Derecho a impugnar la legalidad de la detención','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>20);
		$actoN31Catalogo['actosN3Catalogo'][58]=array('actoN3Id' =>58,'descripcion'=>'Derecho a reparación por la detención arbitraria o ilegal','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>21);
		$actoN31Catalogo['actosN3Catalogo'][59]=array('actoN3Id' =>59,'descripcion'=>'Derecho de indemnización por error judicial','actosN2Catalogo_actoN2Id' =>6,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>22);
		$actoN31Catalogo['actosN3Catalogo'][61]=array('actoN3Id' =>61,'descripcion'=>'Violaciones al derecho a interponer recursos internacionales por VDH y VDI','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>23);
		$actoN31Catalogo['actosN3Catalogo'][62]=array('actoN3Id' =>62,'descripcion'=>'Violaciones al derecho a la asistencia apropiada para acceder a la justicia','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>24);
		$actoN31Catalogo['actosN3Catalogo'][63]=array('actoN3Id' =>63,'descripcion'=>'Violaciones al derecho a la atención médica y sicológica de urgencia','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>25);
		$actoN31Catalogo['actosN3Catalogo'][64]=array('actoN3Id' =>64,'descripcion'=>'Violaciones al derecho a la coadyuvancia','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>26);
		$actoN31Catalogo['actosN3Catalogo'][65]=array('actoN3Id' =>65,'descripcion'=>'Violaciones al derecho a la consideración y atención especiales durante los procedimientos que evite la revictimización','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>27);
		$actoN31Catalogo['actosN3Catalogo'][66]=array('actoN3Id' =>66,'descripcion'=>'Violaciones al derecho a la protección contra actos de intimidación y represalia, para sí y su familia antes, durante y después de los procedimientos','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>28);
		$actoN31Catalogo['actosN3Catalogo'][67]=array('actoN3Id' =>67,'descripcion'=>'Violaciones al derecho a ser informado(a) sobre el desarrollo del proceso penal','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>29);
		$actoN31Catalogo['actosN3Catalogo'][68]=array('actoN3Id' =>68,'descripcion'=>'Violaciones al derecho a una reparación adecuada, efectiva y rápida del daño sufrido','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>30);
		$actoN31Catalogo['actosN3Catalogo'][69]=array('actoN3Id' =>69,'descripcion'=>'Violaciones al derecho al acceso a la información pertinente sobre las violaciones o delitos y mecanismos de reparación','actosN2Catalogo_actoN2Id' =>7,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>31);
		$actoN31Catalogo['actosN3Catalogo'][80]=array('actoN3Id' =>80,'descripcion'=>'Violaciones al derecho a formar asociaciones','actosN2Catalogo_actoN2Id' =>19,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>32);
		$actoN31Catalogo['actosN3Catalogo'][81]=array('actoN3Id' =>81,'descripcion'=>'Violaciones al derecho de afiliarse a asociaciones','actosN2Catalogo_actoN2Id' =>19,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>33);
		$actoN31Catalogo['actosN3Catalogo'][82]=array('actoN3Id' =>82,'descripcion'=>'Violaciones al derecho a fundar una familia','actosN2Catalogo_actoN2Id' =>20,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>34);
		$actoN31Catalogo['actosN3Catalogo'][83]=array('actoN3Id' =>83,'descripcion'=>'Violaciones al derecho a la unidad familiar','actosN2Catalogo_actoN2Id' =>20,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>36);
		$actoN31Catalogo['actosN3Catalogo'][84]=array('actoN3Id' =>84,'descripcion'=>'Violaciones al derecho a la reunificación familiar','actosN2Catalogo_actoN2Id' =>20,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>35);
		$actoN31Catalogo['actosN3Catalogo'][87]=array('actoN3Id' =>87,'descripcion'=>'Violaciones al derecho al acceso al procedimiento de asilo','actosN2Catalogo_actoN2Id' =>24,'notas' =>'El acceso al procedimiento para la determinación de la condición de refugiado es un requisito esencial para hacer efectiva la protección internacional de los refugiados.
		Este principio aplica sin importar el modo en que los solicitantes de asilo hayan llegado a la jurisdicción del Estado. Se debe reconocer como una solicitud de asilo cualquier expresión del solicitante de buscar el reconocimiento como refugiado, y esto debe iniciar la aplicación de la protección contra la devolución.
		Por lo tanto, la disuasión o el rechazo de una solicitud no fundamentada implican una violación al principio de acceso al procedimiento. Asimismo, debe haber una distinción clara entre la negación de la admisibilidad,
		la cual es de naturaleza formal, y las decisiones basadas en un examen de los méritos de la solicitud. 
		Cualquier decisión al respecto debe tomarse dentro de un procedimiento ordinario de determinación del estatuto de refugiado; las solicitudes que no cumplen con los requerimientos de admisibilidad deben ser declaradas inadmisibles en vez de ser rechazadas por motivo de inadmisibilidad.
		','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>37);
		$actoN31Catalogo['actosN3Catalogo'][88]=array('actoN3Id' =>88,'descripcion'=>'Violaciones al derecho a la no devolución','actosN2Catalogo_actoN2Id' =>24,'notas' =>'El acceso físico de los solicitantes al territorio del país en el cual esperan ser admitidos como refugiados, así como el acceso a los procedimientos para la determinación de la condición de refugiado son requisitos esenciales para hacer efectiva la protección internacional de los refugiados.
		Todos los países deben respetar el principio de no devolución.
		','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>38);
		$actoN31Catalogo['actosN3Catalogo'][89]=array('actoN3Id' =>89,'descripcion'=>'Violaciones al derecho a no ser sancionado por ingreso o presencia irregulares','actosN2Catalogo_actoN2Id' =>24,'notas' =>'Todos los que presenten una solicitud deben ser admitidos al territorio y se les debe conceder el derecho temporal de permanecer ahí hasta que se haga una determinación final sobre la solicitud de refugio, sin importar si poseen documentos de identidad personal o de viaje o si éstos son falsos.
		','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>39);
		$actoN31Catalogo['actosN3Catalogo'][90]=array('actoN3Id' =>90,'descripcion'=>'Violaciones al derecho a la confidencialidad','actosN2Catalogo_actoN2Id' =>24,'notas' =>'Los procedimientos de asilo deben respetar siempre la confidencialidad de todos los aspectos de una solicitud de asilo, incluyendo el hecho
		mismo de la presentación de la solicitud. No se debe compartir información alguna sobre la solicitud con el país de origen. La información proporcionada por un solicitante de asilo a las autoridades en el marco de un procedimiento de asilo es confidencial y solamente puede ser usada por las autoridades para los fines para los cuales fue solicitad a; es decir, para determinar la elegibilidad para la protección internacional. Como regla general, no se debe compartir información alguna con las autoridades del paí¬s de origen del solicitante, así¬ como tampoco se debe dar información a un tercer paí¬s sin el consentimiento expreso del individuo afectado. Éste debe dar su aprobación libremente y no bajo coacción.
		','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>40);
		$actoN31Catalogo['actosN3Catalogo'][91]=array('actoN3Id' =>91,'descripcion'=>'Violaciones al derecho al registro y la documentación','actosN2Catalogo_actoN2Id' =>24,'notas' =>'En el caso de México, una FM3 de No inmigrante Refugiado (con derecho a trabajar en cualquier actividad siempre que sea lícita y honesta).
		','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>41);
		$actoN31Catalogo['actosN3Catalogo'][100]=array('actoN3Id' =>100,'descripcion'=>' Violaciones al derecho a la salud sexual y reproductiva                                                                                                                       ','actosN2Catalogo_actoN2Id' =>36,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>42);
		$actoN31Catalogo['actosN3Catalogo'][101]=array('actoN3Id' =>101,'descripcion'=>' Violaciones al derecho al consentimiento informado en tratamientos médicos                                                                                                    ','actosN2Catalogo_actoN2Id' =>36,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>43);
		$actoN31Catalogo['actosN3Catalogo'][109]=array('actoN3Id' =>109,'descripcion'=>' Violaciones al derecho a la identidad cultural','actosN2Catalogo_actoN2Id' =>44,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>44);
		$actoN31Catalogo['actosN3Catalogo'][110]=array('actoN3Id' =>110,'descripcion'=>' Violaciones al derecho a la protección de los intereses morales y materiales                                                                                                  ','actosN2Catalogo_actoN2Id' =>44,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>45);
		$actoN31Catalogo['actosN3Catalogo'][111]=array('actoN3Id' =>111,'descripcion'=>' Violaciones al derecho a la preservación de la cultura                                                                                                                        ','actosN2Catalogo_actoN2Id' =>44,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>46);
		$actoN31Catalogo['actosN3Catalogo'][115]=array('actoN3Id' =>115,'descripcion'=>' Violaciones al derecho de las mujeres a gozar de permiso por maternidad                                                                                                       ','actosN2Catalogo_actoN2Id' =>47,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>47);
		$actoN31Catalogo['actosN3Catalogo'][116]=array('actoN3Id' =>116,'descripcion'=>' Violaciones al derecho de las mujeres a la protección por embarazo                                                                                                            ','actosN2Catalogo_actoN2Id' =>47,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>47);
		$actoN31Catalogo['actosN3Catalogo'][117]=array('actoN3Id' =>117,'descripcion'=>' Violaciones al derecho de las mujeres a no ser objeto de violencia económica por su género                                                                                    ','actosN2Catalogo_actoN2Id' =>47,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>49);
		$actoN31Catalogo['actosN3Catalogo'][118]=array('actoN3Id' =>118,'descripcion'=>' Violaciones al derecho de las mujeres a no ser objeto de violencia física por su género                                                                                       ','actosN2Catalogo_actoN2Id' =>47,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>50);
		$actoN31Catalogo['actosN3Catalogo'][119]=array('actoN3Id' =>119,'descripcion'=>' Violaciones al derecho de las mujeres a no ser objeto de violencia psicológica por su género                                                                                  ','actosN2Catalogo_actoN2Id' =>47,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>51);
		$actoN31Catalogo['actosN3Catalogo'][120]=array('actoN3Id' =>120,'descripcion'=>' Violaciones al derecho de las mujeres trabajadoras a la protección                                                                                                            ','actosN2Catalogo_actoN2Id' =>47,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>52);
		$actoN31Catalogo['actosN3Catalogo'][122]=array('actoN3Id' =>122,'descripcion'=>' Violaciones al derecho de los y las trabajadore(a)s a la huelga                                                                                                               ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>54);
		$actoN31Catalogo['actosN3Catalogo'][123]=array('actoN3Id' =>123,'descripcion'=>' Violaciones al derecho de los y las trabajadore(a)s a la democracia sindical                                                                                                  ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>55);
		$actoN31Catalogo['actosN3Catalogo'][124]=array('actoN3Id' =>124,'descripcion'=>' Violaciones al derecho de los y las trabajadore(a)s a la sindicación                                                                                                          ','actosN2Catalogo_actoN2Id' =>48,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>56);
		$actoN31Catalogo['actosN3Catalogo'][130]=array('actoN3Id' =>130,'descripcion'=>' Violaciones al derecho de las personas privadas de la libertad a instalaciones adecuadas                                                                                      ','actosN2Catalogo_actoN2Id' =>49,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>57);
		$actoN31Catalogo['actosN3Catalogo'][131]=array('actoN3Id' =>131,'descripcion'=>' Violaciones al derecho de las personas privadas de la libertad a trato digno y humano                                                                                         ','actosN2Catalogo_actoN2Id' =>49,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>57);
		$actoN31Catalogo['actosN3Catalogo'][132]=array('actoN3Id' =>132,'descripcion'=>' Violaciones al derecho de las personas privadas de la libertad a información sobre los reglamentos                                                                            ','actosN2Catalogo_actoN2Id' =>49,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>59);
		$actoN31Catalogo['actosN3Catalogo'][133]=array('actoN3Id' =>133,'descripcion'=>' Violaciones al derecho de las personas privadas de la libertad a presentar quejas                                                                                             ','actosN2Catalogo_actoN2Id' =>49,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>60);
		$actoN31Catalogo['actosN3Catalogo'][134]=array('actoN3Id' =>134,'descripcion'=>' Violaciones al derecho de las personas privadas de la libertad a servicios médicos                                                                                            ','actosN2Catalogo_actoN2Id' =>49,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>61);
		$actoN31Catalogo['actosN3Catalogo'][135]=array('actoN3Id' =>135,'descripcion'=>' Violaciones al derecho de separación entre  procesado(a)s y sentenciado(a)s','actosN2Catalogo_actoN2Id' =>49,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>62);
		$actoN31Catalogo['actosN3Catalogo'][136]=array('actoN3Id' =>136,'descripcion'=>' Violaciones al derecho de las personas sentenciadas a los beneficios de la preliberación                                                                                      ','actosN2Catalogo_actoN2Id' =>50,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>63);
		$actoN31Catalogo['actosN3Catalogo'][137]=array('actoN3Id' =>137,'descripcion'=>' Violaciones al derecho de las personas sentenciadas a un trabajo productivo y apropiado                                                                                       ','actosN2Catalogo_actoN2Id' =>50,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>64);
		$actoN31Catalogo['actosN3Catalogo'][138]=array('actoN3Id' =>138,'descripcion'=>' Violaciones al derecho de las personas LGBT a no ser objeto de violencia por su orientación sexual                                                                            ','actosN2Catalogo_actoN2Id' =>51,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>65);
		$actoN31Catalogo['actosN3Catalogo'][139]=array('actoN3Id' =>139,'descripcion'=>' Violaciones al derecho de las niñas y los niños a expresarse y ser escuchada(o)s                                                                                              ','actosN2Catalogo_actoN2Id' =>52,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>66);
		$actoN31Catalogo['actosN3Catalogo'][140]=array('actoN3Id' =>140,'descripcion'=>' Violaciones al derecho de las niñas y los niños a jugar y descansar                                                                                                           ','actosN2Catalogo_actoN2Id' =>52,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>67);
		$actoN31Catalogo['actosN3Catalogo'][141]=array('actoN3Id' =>141,'descripcion'=>' Violaciones al derecho de las niñas y los niños a la protección                                                                                                               ','actosN2Catalogo_actoN2Id' =>52,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>68);
		$actoN31Catalogo['actosN3Catalogo'][142]=array('actoN3Id' =>142,'descripcion'=>' Violaciones al derecho de las niñas y los niños a no trabajar                                                                                                                 ','actosN2Catalogo_actoN2Id' =>52,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>69);
		$actoN31Catalogo['actosN3Catalogo'][143]=array('actoN3Id' =>143,'descripcion'=>' Violaciones al derecho de las niñas y los niños a no carearse con el inculpado(a) en caso que los pueda afectar                                                               ','actosN2Catalogo_actoN2Id' =>52,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>70);
		$actoN31Catalogo['actosN3Catalogo'][144]=array('actoN3Id' =>144,'descripcion'=>' Violaciones al derecho de las personas con discapacidad a beneficios sociales                                                                                                 ','actosN2Catalogo_actoN2Id' =>53,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>71);
		$actoN31Catalogo['actosN3Catalogo'][145]=array('actoN3Id' =>145,'descripcion'=>' Violaciones al derecho de las personas con discapacidad a la asistencia                                                                                                       ','actosN2Catalogo_actoN2Id' =>53,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>72);
		$actoN31Catalogo['actosN3Catalogo'][146]=array('actoN3Id' =>146,'descripcion'=>' Violaciones al derecho de las personas con discapacidad a la integración o reintegración social                                                                               ','actosN2Catalogo_actoN2Id' =>53,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>73);
		$actoN31Catalogo['actosN3Catalogo'][147]=array('actoN3Id' =>147,'descripcion'=>' Violaciones al derecho de las personas con discapacidad al empleo adecuado                                                                                                    ','actosN2Catalogo_actoN2Id' =>53,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>74);
		$actoN31Catalogo['actosN3Catalogo'][148]=array('actoN3Id' =>148,'descripcion'=>' Violaciones al derecho de las personas adultas mayores a la protección                                                                                                        ','actosN2Catalogo_actoN2Id' =>54,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>75);
		$actoN31Catalogo['actosN3Catalogo'][149]=array('actoN3Id' =>149,'descripcion'=>' Violaciones al derecho a la prevención y protección contra el desplazamiento                                                                                                  ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>76);
		$actoN31Catalogo['actosN3Catalogo'][150]=array('actoN3Id' =>150,'descripcion'=>' Violaciones al derecho de las personas desplazadas a la protección contra la destrucción, apropiación, ocupación o uso arbitrario e ilegal de sus bienes que hayan abandonado ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>77);
		$actoN31Catalogo['actosN3Catalogo'][151]=array('actoN3Id' =>151,'descripcion'=>' Violaciones al derecho de las personas desplazadas a la reunificación familiar                                                                                                ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>78);
		$actoN31Catalogo['actosN3Catalogo'][152]=array('actoN3Id' =>152,'descripcion'=>' Violaciones al derecho de las personas desplazadas a participar en la planificación y gestión de su reasentamiento                                                            ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>79);
		$actoN31Catalogo['actosN3Catalogo'][153]=array('actoN3Id' =>153,'descripcion'=>' Violaciones al derecho de las personas desplazadas a recibir asistencia a su regreso, reasentamiento y reintegración                                                          ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>80);
		$actoN31Catalogo['actosN3Catalogo'][154]=array('actoN3Id' =>154,'descripcion'=>' Violaciones al derecho de las personas desplazadas a recibir protección y asistencia humanitaria                                                                              ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>81);
		$actoN31Catalogo['actosN3Catalogo'][155]=array('actoN3Id' =>155,'descripcion'=>' Violaciones al derecho de las personas desplazadas a la indemnización por desplazamiento                                                                                      ','actosN2Catalogo_actoN2Id' =>55,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>82);
		$actoN31Catalogo['actosN3Catalogo'][156]=array('actoN3Id' =>156,'descripcion'=>' Violaciones al derecho de las y los defensore(a)s a recibir financiamiento para la defensa y promoción de los derechos humanos                                                ','actosN2Catalogo_actoN2Id' =>56,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>85);
		$actoN31Catalogo['actosN3Catalogo'][157]=array('actoN3Id' =>157,'descripcion'=>' Violaciones al derecho de las y los defensore(a)s a hacer críticas y propuestas en materia de derechos humanos                                                                ','actosN2Catalogo_actoN2Id' =>56,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>84);
		$actoN31Catalogo['actosN3Catalogo'][158]=array('actoN3Id' =>158,'descripcion'=>' Violaciones al derecho de las y los defensore(a)s a promover y procurar la protección y realización de los derechos humanos                                                   ','actosN2Catalogo_actoN2Id' =>56,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>83);
		$actoN31Catalogo['actosN3Catalogo'][159]=array('actoN3Id' =>159,'descripcion'=>' Violaciones al derechos de las y los consumidores a la protección de la salud y la seguridad                                                                                  ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>86);
		$actoN31Catalogo['actosN3Catalogo'][160]=array('actoN3Id' =>160,'descripcion'=>' Violaciones al derecho de las y los consumidores a la protección de los intereses económicos y sociales                                                                       ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>87);
		$actoN31Catalogo['actosN3Catalogo'][161]=array('actoN3Id' =>161,'descripcion'=>' Violaciones al derecho de las y los consumidores a la información                                                                                                             ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>88);
		$actoN31Catalogo['actosN3Catalogo'][162]=array('actoN3Id' =>162,'descripcion'=>' Violaciones al derecho de las y los consumidores a la educación y formación en materia de consumo                                                                             ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>89);
		$actoN31Catalogo['actosN3Catalogo'][163]=array('actoN3Id' =>163,'descripcion'=>' Violaciones al derecho de las y los consumidores de representación, consulta y participación                                                                                  ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>90);
		$actoN31Catalogo['actosN3Catalogo'][164]=array('actoN3Id' =>164,'descripcion'=>' Violaciones al derecho de las y los consumidores a obtener protección ante cualquier situación que cause inferioridad, subordinación o indefensión                            ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>91);
		$actoN31Catalogo['actosN3Catalogo'][165]=array('actoN3Id' =>165,'descripcion'=>' Violaciones al derecho de las y los consumidores a la reparación de daños y prejuicios que les causen                                                                         ','actosN2Catalogo_actoN2Id' =>57,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>92);
		$actoN31Catalogo['actosN3Catalogo'][166]=array('actoN3Id' =>166,'descripcion'=>' Violaciones al derecho de los pueblos indígenas a la autonomía política, económica y social                                                                                   ','actosN2Catalogo_actoN2Id' =>63,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>93);
		$actoN31Catalogo['actosN3Catalogo'][167]=array('actoN3Id' =>167,'descripcion'=>' Violaciones al derecho de los pueblos indígenas a la consulta y participación                                                                                                 ','actosN2Catalogo_actoN2Id' =>63,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>94);
		$actoN31Catalogo['actosN3Catalogo'][168]=array('actoN3Id' =>168,'descripcion'=>' Violaciones al derecho de los pueblos indígenas a la jurisdicción indígena                                                                                                    ','actosN2Catalogo_actoN2Id' =>63,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>95);
		$actoN31Catalogo['actosN3Catalogo'][169]=array('actoN3Id' =>169,'descripcion'=>' Violaciones al derecho de los pueblos indígenas a la personería jurídica                                                                                                      ','actosN2Catalogo_actoN2Id' =>63,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>96);
		$actoN31Catalogo['actosN3Catalogo'][170]=array('actoN3Id' =>170,'descripcion'=>' Violaciones al derecho de los pueblos indígenas a la tierra y territorio                                                                                                      ','actosN2Catalogo_actoN2Id' =>63,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>97);
		$actoN31Catalogo['actosN3Catalogo'][171]=array('actoN3Id' =>171,'descripcion'=>' Violaciones al derecho de los pueblos indígenas a su cultura, identidad y educación                                                                                           ','actosN2Catalogo_actoN2Id' =>63,'notas' =>'','derechosAfectadosN3Catalogo_derechoAfectadoN3Id' =>98);

		$this->agregar_catalogos_m->mAgregarDerechosCatalogos($actoN31Catalogo);
		echo 'Catalogos de actosN3 parte 2 ingresados correctamente<br />';

	}

	public function cAgregarActosCatalogoN4(){

		$actoN4Catalogo['actosN4Catalogo'][1]=array('actoN4Id' =>1,'descripcion'=>'Muerte resultado de negligencia médica','actosN3Catalogo_actoN3Id' =>9);
		$actoN4Catalogo['actosN4Catalogo'][2]=array('actoN4Id' =>2,'descripcion'=>'Muerte resultado de la aplicación de la tortura','actosN3Catalogo_actoN3Id' =>10);
		$actoN4Catalogo['actosN4Catalogo'][3]=array('actoN4Id' =>3,'descripcion'=>'Muerte resultado del uso desproporcionado o indebido de la fuerza pública','actosN3Catalogo_actoN3Id' =>10);
		$actoN4Catalogo['actosN4Catalogo'][4]=array('actoN4Id' =>4,'descripcion'=>'Amenazas','actosN3Catalogo_actoN3Id' =>17);
		$actoN4Catalogo['actosN4Catalogo'][5]=array('actoN4Id' =>5,'descripcion'=>'Amenazas de muerte','actosN3Catalogo_actoN3Id' =>17);
		$actoN4Catalogo['actosN4Catalogo'][6]=array('actoN4Id' =>6,'descripcion'=>'Hostigamiento','actosN3Catalogo_actoN3Id' =>17);
		$actoN4Catalogo['actosN4Catalogo'][7]=array('actoN4Id' =>7,'descripcion'=>'Vigilancia','actosN3Catalogo_actoN3Id' =>17);
		$actoN4Catalogo['actosN4Catalogo'][24]=array('actoN4Id' =>24,'descripcion'=>'Negativa, inadmisibilidad  de la solicitud de asilo','actosN3Catalogo_actoN3Id' =>87);
		$actoN4Catalogo['actosN4Catalogo'][25]=array('actoN4Id' =>25,'descripcion'=>'Disuasión para no presentar una solicitud de asilo','actosN3Catalogo_actoN3Id' =>87);
		$actoN4Catalogo['actosN4Catalogo'][26]=array('actoN4Id' =>26,'descripcion'=>'Rechazo de la solicitud de asilo no fundamentado','actosN3Catalogo_actoN3Id' =>87);
		$actoN4Catalogo['actosN4Catalogo'][27]=array('actoN4Id' =>27,'descripcion'=>'Desinformación respecto del procedimiento de asilo','actosN3Catalogo_actoN3Id' =>87);
		$actoN4Catalogo['actosN4Catalogo'][28]=array('actoN4Id' =>28,'descripcion'=>'No reconocimiento del estatuto de refugiado reconocido en otro país','actosN3Catalogo_actoN3Id' =>87);
		$actoN4Catalogo['actosN4Catalogo'][29]=array('actoN4Id' =>29,'descripcion'=>'No acceso al procedimiento de asilo por considerar la solicitud manifiestamente infundada, abusiva o fraudulenta.','actosN3Catalogo_actoN3Id' =>87);
				$this->agregar_catalogos_m->mAgregarDerechosCatalogos($actoN4Catalogo);
		echo 'Catalogos de actosN4 parte 1 ingresados correctamente<br />';

	}

	public function cAgregarActosCatalogoN41(){

		$actoN41Catalogo['actosN4Catalogo'][8]=array('actoN4Id' =>8,'descripcion'=>'Violaciones al derecho a ser informado(a) de las razones de la detención','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>1);
		$actoN41Catalogo['actosN4Catalogo'][9]=array('actoN4Id' =>9,'descripcion'=>'Violaciones al derecho a la libertad bajo fianza','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>2);
		$actoN41Catalogo['actosN4Catalogo'][10]=array('actoN4Id' =>10,'descripcion'=>'Violaciones al derecho a la no aplicación retroactiva de la ley en su perjuicio','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>3);
		$actoN41Catalogo['actosN4Catalogo'][11]=array('actoN4Id' =>11,'descripcion'=>'Violaciones al derecho a la presunción de inocencia','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>4);
		$actoN41Catalogo['actosN4Catalogo'][12]=array('actoN4Id' =>12,'descripcion'=>'Violaciones al derecho a no declarar en su contra','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>5);
		$actoN41Catalogo['actosN4Catalogo'][13]=array('actoN4Id' =>13,'descripcion'=>'Violaciones al derecho a no ser juzgado(a) dos veces por el mismo delito','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>6);
		$actoN41Catalogo['actosN4Catalogo'][14]=array('actoN4Id' =>14,'descripcion'=>'Violaciones al derecho a ser informado(a) de los cargos en su contra','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>7);
		$actoN41Catalogo['actosN4Catalogo'][15]=array('actoN4Id' =>15,'descripcion'=>'Violaciones al derecho a ser llevado(a) sin demora ante un(a) juez(a)','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>8);
		$actoN41Catalogo['actosN4Catalogo'][16]=array('actoN4Id' =>16,'descripcion'=>'Violaciones al derecho a ser procesado(a) sin demora o puesto(a) en libertad','actosN3Catalogo_actoN3Id' =>45,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>9);
		$actoN41Catalogo['actosN4Catalogo'][17]=array('actoN4Id' =>17,'descripcion'=>'Violaciones al derecho a comunicarse con su defensor(a)','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>10);
		$actoN41Catalogo['actosN4Catalogo'][18]=array('actoN4Id' =>18,'descripcion'=>'Violaciones al derecho a disponer del tiempo y los medios adecuados para su defensa','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>11);
		$actoN41Catalogo['actosN4Catalogo'][19]=array('actoN4Id' =>19,'descripcion'=>'Violaciones al derecho a tener acceso a asistencia letrada durante el interrogatorio','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>12);
		$actoN41Catalogo['actosN4Catalogo'][20]=array('actoN4Id' =>20,'descripcion'=>'Violaciones al derecho a un defensor(a) de oficio','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>13);
		$actoN41Catalogo['actosN4Catalogo'][21]=array('actoN4Id' =>21,'descripcion'=>'Violaciones al derecho a un(a) intérprete','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>14);
		$actoN41Catalogo['actosN4Catalogo'][22]=array('actoN4Id' =>22,'descripcion'=>'Violaciones al derecho a una defensa eficaz','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>15);
		$actoN41Catalogo['actosN4Catalogo'][23]=array('actoN4Id' =>23,'descripcion'=>'Violaciones al derecho al defensor(a) de su elección','actosN3Catalogo_actoN3Id' =>46,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>16);
		$actoN41Catalogo['actosN4Catalogo'][30]=array('actoN4Id' =>30,'descripcion'=>' Violaciones al derecho a no ser objeto de esterilización sin consentimiento informado','actosN3Catalogo_actoN3Id' =>100,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>17);
		$actoN41Catalogo['actosN4Catalogo'][31]=array('actoN4Id' =>31,'descripcion'=>' Violaciones al derecho a no ser objeto de aborto forzado','actosN3Catalogo_actoN3Id' =>100,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>18);
		$actoN41Catalogo['actosN4Catalogo'][32]=array('actoN4Id' =>32,'descripcion'=>' Violaciones al derecho a la interrupción del embarazo en casos permitidos por la ley','actosN3Catalogo_actoN3Id' =>100,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>19);
		$actoN41Catalogo['actosN4Catalogo'][33]=array('actoN4Id' =>33,'descripcion'=>' Violaciones al derecho a planificar libremente los hijos que se desea tener','actosN3Catalogo_actoN3Id' =>100,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>20);
		$actoN41Catalogo['actosN4Catalogo'][34]=array('actoN4Id' =>34,'descripcion'=>' Violaciones al derecho a los servicios de salud sexual y reproductiva','actosN3Catalogo_actoN3Id' =>100,'derechosAfectadosN4Catalogo_derechoAfectadoN4Id' =>21);

		$this->agregar_catalogos_m->mAgregarDerechosCatalogos($actoN41Catalogo);
		echo 'Catalogos de actosN4 parte 2 ingresados correctamente<br />';

	}


    public function cAgregarDerechosCatalogos(){
        
        $derechosN1 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel1.csv');
        
        $derechosN1 = explode('&', $derechosN1);
        
        foreach($derechosN1 as $derechoN1){
            
            $obtener_datos = explode('¬', $derechoN1);
                
              $derechos['derechosAfectadosN1Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN1Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]));

        }

        $derechosN2 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel2.csv');
        
        $derechosN2 = explode('&', $derechosN2);
        
        foreach($derechosN2 as $derechoN2){
            
            $obtener_datos = explode('¬', $derechoN2);
                
              $derechos['derechosAfectadosN2Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN2Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN1Catalogo_derechoAfectadoN1Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN3 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel3.csv');
        
        $derechosN3 = explode('&', $derechosN3);
        
        foreach($derechosN3 as $derechoN3){
            
            $obtener_datos = explode('¬', $derechoN3);
                
              $derechos['derechosAfectadosN3Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN3Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN2Catalogo_derechoAfectadoN2Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN4 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel4.csv');
        
        $derechosN4 = explode('&', $derechosN4);
        
        foreach($derechosN4 as $derechoN4){
            
            $obtener_datos = explode('¬', $derechoN4);
                
              $derechos['derechosAfectadosN4Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN4Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN3Catalogo_derechoAfectadoN3Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarDerechosCatalogos($derechos);
        
        echo 'cataologos de derechos afectados ingresados correctamente<br />';
        
    }
    
        public function cAgregarActosCatalogos(){
        
        $derechosN1 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel1.csv');
        
        $derechosN1 = explode('&', $derechosN1);
        
        foreach($derechosN1 as $derechoN1){
            
            $obtener_datos = explode('¬', $derechoN1);
                
              $derechos['actosN1Catalogo'][trim($obtener_datos[0])] = array('actoId' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]));

        }

        $derechosN2 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel2.csv');
        
        $derechosN2 = explode('&', $derechosN2);
        
        foreach($derechosN2 as $derechoN2){
            
            $obtener_datos = explode('¬', $derechoN2);
                
              $derechos['actosN2Catalogo'][trim($obtener_datos[0])] = array('actoN2Id' => trim($obtener_datos[0]), 
              'descripcion' => trim($obtener_datos[1]), 
              'actosN1Catalogo_actoId' => trim($obtener_datos[2]), 
              'notas' => trim($obtener_datos[3]),
              'derechosAfectadosN2Catalogo_derechoAfectadoN2Id' => trim($obtener_datos[4]));

        }
		
        
       $this->agregar_catalogos_m->mAgregarDerechosCatalogos($derechos);
        
        echo 'Cataologos de actos violatorios ingresados correctamente<br />';
        
    }
    
    public function cAgregarCatalogosLugares(){
        
        $paises = read_file('statics/catalogos/catalogosLugares/paises.csv');
        
        $estados = read_file('statics/catalogos/catalogosLugares/CatalogosEdos.csv');
        
        $municipios = read_file('statics/catalogos/catalogosLugares/CatalogosMunicipios.csv');
        
        $paises = explode('&', $paises);
        
        $estados = explode('&', $estados);
        
        $municipios = explode('&', $municipios);
        
        foreach($paises as $pais){
            
            $datos_pais = explode('¬', $pais);
            
            $lugares['paisesCatalogo'][$datos_pais[0]] = array('paisId' => trim($datos_pais[0]), 'nombre' => trim($datos_pais[1]));
            
        }
        
        foreach($estados as $estado){
            
            $datos_estado = explode('¬', $estado);
            
            $lugares['estadosCatalogo'][trim($datos_estado[0])] = array('estadoId' => trim($datos_estado[0]), 'nombre' => trim($datos_estado[1]), 'paises_paisId' => trim($datos_estado[2]));
            
        }
        
        foreach($municipios as $municipio){
            
            $datos_municipio = explode('¬', $municipio);
            
            $lugares['municipiosCatalogo'][trim($datos_municipio[0])] = array('municipioId' => trim($datos_municipio[0]), 'nombre' => trim($datos_municipio[1]), 'estados_estadoId' => trim($datos_municipio[2]));
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($lugares);
        
        echo 'Catalogos de lugares insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogosTipoDeIntervencion(){
        
        for($n = 1; $n <= 4; $n++){
            
            $tipoDeIntervencion[$n] = explode('&', read_file('statics/catalogos/catalogotipodeintervencion/TipodeIntervencion_nivel'.$n.'.csv'));
            
        }
            
            foreach($tipoDeIntervencion[1] as $nivelDeIntervencion){
                
                $datosNivel = explode('¬', $nivelDeIntervencion);
            
                $tiposDeIntervencionNiveles['tipoIntervencionN1Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN1Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]));
   
            }
            
            foreach($tipoDeIntervencion[2] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN2Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN2Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN1Catalogo_tipoIntervencionN1Id' => trim($datosNivel[2]));
                
            }
            
            foreach($tipoDeIntervencion[3] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN3Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN3Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN2Catalogo_tipoIntervencionN2Id' => trim($datosNivel[2]));
                
            }
            
            foreach($tipoDeIntervencion[4] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN4Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN4Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN3Catalogo_tipoIntervencionN3Id' => trim($datosNivel[2]));
                
            }
            
     
        
            $this->agregar_catalogos_m->mAgregarCatalogos($tiposDeIntervencionNiveles);
        
            echo 'Catalogos de Tipo de intervencion insertados exitosamente<br />';
            
    }
    
    public function cAgregarCatalogosTipoPerpetrador(){
        
        for($n = 1; $n <= 5; $n++){
            
            $tipoDePerpetrador[$n] = explode('&', read_file('statics/catalogos/catalogotipodeperpetrador/TipodePerpetrador_nivel'.$n.'.csv'));
            
        }
        foreach($tipoDePerpetrador[1] as $nivelDePerpetrador){
                
                    $datosNivel = explode('¬', $nivelDePerpetrador);
                
                    $tiposDePerpetradorNiveles['tipoPerpetradorN1Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN1Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[2]));
               
        }
        
        foreach($tipoDePerpetrador[2] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN2Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN2Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN1Catalogo_tipoPerpetradorN1Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[3] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN3Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN3Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[4] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN4Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN4Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[5] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN5Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN5Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN4Catalogo_tipoPerpetradorN4Id' => trim($datosNivel[2]));
                
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($tiposDePerpetradorNiveles);
        
        echo 'Catalogos de tipos de perpetrador insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoGruposIndigenas(){
        
        $catalogoGruposIndigenas = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeGruposIndigenas.csv'));
        
        foreach($catalogoGruposIndigenas as $grupoIndigena){
                
            $datosGrupo = explode('¬', $grupoIndigena);
                
            $gruposIndigenas['gruposIndigenas'][trim($datosGrupo[0])] = array('grupoIndigenaId' => trim($datosGrupo[0]), 'paisId' => trim($datosGrupo[2]), 'descripcion' => trim($datosGrupo[1]), 'notas' => trim($datosGrupo[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($gruposIndigenas);
        
        echo 'Catalogos de grupos indigenas insertados exitosamente.<br />';
        
    }
	
	public function cAgregarCatalogoTipoRelacionCasos(){
        
        $catalogoTipoRelacionCasos = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoRelacionCasos.csv'));
        
        foreach($catalogoTipoRelacionCasos as $tipoRelacion){
                
            $datosTipoRelacion = explode('¬', $tipoRelacion);
                
            $tiposRelaciones['relacionCasosCatalogo'][trim($datosTipoRelacion[0])] = array('relacionCasosId' => trim($datosTipoRelacion[0]), 'descripcion' => trim($datosTipoRelacion[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($tiposRelaciones);
        
        echo 'Catalogos de tipos de relacion entre casos insertados exitosamente.<br />';
        
    }
	
	
	public function cAgregarCatalogoMotivoViaje(){
        
        $catalogoGruposIndigenas = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoMotivoDelViaje.csv'));
      
        foreach($catalogoGruposIndigenas as $motivoViaje){
             
           $datosGrupo = explode('¬', $motivoViaje);    
           $motivosViaje['motivoViajeCatalogo'][trim($datosGrupo[0])] = array('motivoViajeId' => trim($datosGrupo[0]), 'descripcion' => trim($datosGrupo[1]));
			
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($motivosViaje);
        
        echo 'Catalogos de motivos Viaje insertados exitosamente.<br />';
        
    }
    
	 public function cAgregarCatalogoActosDerechoAfectado(){
        
        $catalogoActosDA = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoActosDA.csv'));
        
        foreach($catalogoActosDA as $actoDA){
                
            $datosGrupo = explode('¬', $actoDA);
                
            $actosDA['actosN1Catalogo_has_derechosAfactadosN1Catalogo'][trim($datosGrupo[0])] = array('actosN1Catalogo_actoId' => trim($datosGrupo[0]), 'derechosAfactadosN1Catalogo_derechoAfectadoN1Id' => trim($datosGrupo[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($actosDA);
        
        echo 'Catalogos de actos derecho afectado insertados exitosamente.<br />';
        
    }
	
	
	
    public function cAgregarCatalogoDeNacionalidades(){
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/nacionalidadesCatalogo.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['nacionalidadesCatalogo'][$datosOcupacion[0]] = array('nacionalidadId' => trim($datosOcupacion[0]), 'nombre' => trim($datosOcupacion[1]), 'generoNacionalidad' => trim($datosOcupacion[2]));
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($ocupaciones);
        
        echo 'Catalogo de nacionalidades insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoDeOcupaciones(){
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeOcupacionesActoresIndividuales.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
		
            $ocupaciones['ocupacionesCatalogo'][$datosOcupacion[0]] = array('ocupacionId' => trim($datosOcupacion[1]), 'descripcion' => trim($datosOcupacion[1]), 'notas' => trim($datosOcupacion[2]), 'tipoActorId' => 1);
            
        }
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeOcupacionesActoresColectivos.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['ocupacionesCatalogo'][$datosOcupacion[0]] = array('ocupacionId' => trim($datosOcupacion[1]), 'descripcion' => trim($datosOcupacion[1]), 'notas' => trim($datosOcupacion[2]), 'tipoActorId' => 2);
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($ocupaciones);
        
        echo 'Catalogo de ocupaciones insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoEstatusDeLaVictima(){
        
        $catalogoEstatusDeLAVictima = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoEstatusDeLaVictima.csv'));
        
        foreach($catalogoEstatusDeLAVictima as $estatusDeLaVictima){
                
            $datosEstatusDeLaVictima = explode('¬', $estatusDeLaVictima);
                
            $estatus['estatusVictimaCatalogo'][trim($datosEstatusDeLaVictima[0])] = array('estatusVictimaId' => trim($datosEstatusDeLaVictima[0]), 'descripcion' => trim($datosEstatusDeLaVictima[1]), 'notas' => trim($datosEstatusDeLaVictima[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estatus);
        
        echo 'Catalogo de estatus de victimas insertado exitosamente.<br />';
        
    }
    
        public function cAgregarCatalogoEstatusDelPerpetrador(){
        
        $catalogoEstatusDelPerpetrador = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoEstatusDelPerpetrador.csv'));
        
        foreach($catalogoEstatusDelPerpetrador as $estatusDelPerpetrador){
                
            $datosEstatusDelPerpetrador = explode('¬', $estatusDelPerpetrador);
                
            $estatus['estatusPerpetradorCatalogo'][trim($datosEstatusDelPerpetrador[0])] = array('estatusPerpetradorId' => trim($datosEstatusDelPerpetrador[0]), 'descripcion' => trim($datosEstatusDelPerpetrador[1]), 'notas' => trim($datosEstatusDelPerpetrador[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estatus);
        
        echo 'Catalogo de estatus de perpetradores insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoNivelDeConfiabilidad(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoNivelDeConfiabilidad.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['nivelConfiabilidadCatalogo'][trim($datos[0])] = array('nivelConfiabilidadId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de niveles de confiabilidad de las funetes insertados exitosamente.<br />';
        
    }

    
    public function cAgregarCatalogoTipoDeFuente(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoDeFuente.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoFuenteCatalogo'][trim($datos[0])] = array('tipoFuenteId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]) ,'selectorTipoFuente' => 1);

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de niveles de confiabilidad de las funetes insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoTipoDeActorColectivo(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/tipoDeActorColectivo.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoActorColectivo'][trim($datos[0])] = array('tipoActorColectivoId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de actores colectivos insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoRelacionEntreActores(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/relacionEntreActores.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['relacionActoresCatalogo'][trim($datos[0])] = array('tipoRelacionId' => trim($datos[0]), 'nombre' => trim($datos[1]), 'notas' => trim($datos[2]), 'nivel2' => trim($datos[3]), 'tipoDeRelacionId' => trim($datos[4]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de relación entre actores insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoNivelEscolaridad(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoGradoEscolaridad.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['nivelEscolaridadCatalogo'][trim($datos[0])] = array('nivelEscolaridadId' => trim($datos[0]), 'descripcion' => trim($datos[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de grados de escolaridad insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoTipoDeDireccion(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoDeDireccion.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoDireccionCatalogo'][trim($datos[0])] = array('tipoDireccionId' => trim($datos[0]), 'descripcion' => trim($datos[1]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipos de direccion insertado exitosamente.<br />';
        
    }
    
    
    public function cAgregarCatalogoGradoInvolucramientoN1(){
    	
		$catalogo =explode('&',read_file('statics/catalogos/catalogogradodeinvolucramiento/GradodeInvolucramientoNivel1.csv'));
	
		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['gradoInvolucramientoN1Catalogo'][trim($datos[0])] = array('gradoInvolucramientoN1Id' => trim($datos[0]), 'descripcion' => trim($datos[1]),'notas' => trim($datos[2]));

        }
		 
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de grado involucramiento N1 insertado exitosamente.<br />';
    }
	
    public function cAgregarCatalogoGradoInvolucramientoN2(){
    	
		$catalogo =explode('&',read_file('statics/catalogos/catalogogradodeinvolucramiento/GradodeInvolucramientoNivel2.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['gradoInvolucramientoN2Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
            'gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id'=>trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de grado involucramiento N2 insertado exitosamente.<br />';
    }
    
	public function cAgregarCatalogoTipoLugarN1(){
		
		$catalogo =explode('&',read_file('statics/catalogos/catalogoTipoLugar/catalogoTipoLugarNivel1.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoLugarN1Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo lugar N1 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoLugarN2(){
		
		$catalogo =explode('&',read_file('statics/catalogos/catalogoTipoLugar/catalogoTipoLugarNivel2.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoLugarN2Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
			'tipoLugarN1Catalogo_tipoLugarId' => trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo lugar N2 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoLugarN3(){
		
		$catalogo =explode('&',read_file('statics/catalogos/catalogoTipoLugar/catalogoTipoLugarNivel3.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoLugarN3Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
			'tipoLugarN2Catalogo_tipoLugarN2Id' => trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo lugar N3 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoFuenteDocumentalN1()
	{
		$catalogo =explode('&',read_file('statics/catalogos/catalogosFuenteDocumental/tipoFuenteDocumentalN1Catalogo.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoFuenteDocumentalN1Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo fuente documental N1 insertado exitosamente.<br />';
	}
	
	public function cAgregarCatalogoTipoFuenteDocumentalN2()
	{
		$catalogo =explode('&',read_file('statics/catalogos/catalogosFuenteDocumental/tipoFuenteDocumentalN2Catalogo.csv'));

		foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
			
            $filas['tipoFuenteDocumentalN2Catalogo'][trim($datos[0])] = array('descripcion' => trim($datos[1]),'notas' => trim($datos[2]),
			'tipoFuenteDocumentalN1Catalogo_tipoFuenteDocumentalN1CatalogoId' => trim($datos[3]));
        }
		 $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipo fuente documental N2 insertado exitosamente.<br />';
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */
