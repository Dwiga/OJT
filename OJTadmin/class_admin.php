<?php
function isAjax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']);
}

function seo_title($str, $options = array()) {
	// Make sure string is in UTF-8 and strip invalid UTF-8 characters
	// $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
	
	$defaults = array(
		'delimiter' => '-',
		'limit' => null,
		'lowercase' => true,
		'replacements' => array(),
		'transliterate' => false,
	);
	
	// Merge options
	$options = array_merge($defaults, $options);
	
	$char_map = array(
		// Latin
		'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
		'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
		'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
		'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
		'ß' => 'ss', 
		'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
		'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
		'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
		'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
		'ÿ' => 'y',

		// Latin symbols
		'©' => '(c)',

		// Greek
		'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
		'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
		'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
		'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
		'Ϋ' => 'Y',
		'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
		'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
		'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
		'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
		'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

		// Turkish
		'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
		'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

		// Russian
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
		'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
		'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
		'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
		'Я' => 'Ya',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
		'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
		'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
		'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
		'я' => 'ya',

		// Ukrainian
		'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
		'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

		// Czech
		'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
		'Ž' => 'Z', 
		'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
		'ž' => 'z', 

		// Polish
		'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
		'Ż' => 'Z', 
		'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
		'ż' => 'z',

		// Latvian
		'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
		'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
		'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
		'š' => 's', 'ū' => 'u', 'ž' => 'z'
	);
	
	/* Make custom replacements*/
	$str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
	
	// Transliterate characters to ASCII
	if ($options['transliterate']) {
		$str = str_replace(array_keys($char_map), $char_map, $str);
	}
	
	// Replace non-alphanumeric characters with our delimiter
	$str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
	
	// Remove duplicate delimiters
	$str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
	
	// Truncate slug to max. characters
	$str = substr($str, 0, ($options['limit'] ? $options['limit'] : strlen($str)));
	
	// Remove delimiter from ends
	$str = trim($str, $options['delimiter']);
	
	return $options['lowercase'] ? strtolower($str) : $str;
}




class adminPage extends koneksi{
	public function __construct(){
		parent::__construct();
	}

	public function profil() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM profil WHERE idprofil = :id");
			parent::bind(":id", 1);
			parent::execute();
			parent::endTransaction();
			return parent::fetch();
		} catch (PDOException $e) {}
	}
	public function slideshow() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM slideshow WHERE status = :id");
			parent::bind(":id", 1);
			parent::execute();
			parent::endTransaction();
			return parent::fetchAll();
		} catch (PDOException $e) {}
	}
	public function beranda() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM beranda WHERE idberanda = :id");
            parent::bind(":id",1);
			parent::execute();
			parent::endTransaction();
			return parent::fetchAll();
		} catch (PDOException $e) {}
	}
	public function kebijakan() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM kebijakan WHERE idkebijakan = :id");
			parent::bind(":id", 1);
			parent::execute();
			parent::endTransaction();
			return parent::fetchAll();
		} catch (PDOException $e) {}
	}
	public function manager() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM manager");
			parent::execute();
			parent::endTransaction();
			return parent::fetchAll();
		} catch (PDOException $e) {}
	}
	public function cmb() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM cmb");
			parent::execute();
			parent::endTransaction();
			return parent::fetchAll();
		} catch (PDOException $e) {}
	}
	public function user() {
		try {
			parent::beginTransaction();
			parent::query("SELECT * FROM user");
			parent::execute();
			parent::endTransaction();
			return parent::fetch();
		} catch (PDOException $e) {}
	}
    public function link(){
        try{
            parent::beginTransaction();
			parent::query("SELECT * FROM link where idlink=:id");
            parent::bind(":id",1);
			parent::execute();
			parent::endTransaction();
			return parent::fetch();
        } catch (PDOException $e) {}
    }
    public function ketlink(){
        try{
            parent::beginTransaction();
            parent::query("SELECT * from link where idlink=:id");
            parent::bind(":id",2);
            parent::execute();
            parent::endTransaction();
            return parent::fetch();
        }catch (PDOException $e){}
    }
    public function legalitas(){
        try{
            parent::beginTransaction();
            parent::query("SELECT * from legalitas");            
            parent::execute();
            parent::endTransaction();
            return parent::fetchAll();
        }catch (PDOException $e){}
    }
    public function model(){
        try{
            parent::beginTransaction();
            parent::query("SELECT * from model where idmodel=:id");
            parent::bind(":id",1);
            parent::execute();
            parent::endTransaction();
            return parent::fetch();
        }catch (PDOException $e){}
    }
    public function penghargaan(){
        try{
            parent::beginTransaction();
            parent::query("SELECT * from penghargaan");
            parent::execute();
            parent::endTransaction();
            return parent::fetchAll();
        }catch (PDOException $e){}
    }
	
	public function menuArray() {
		$menu = array(
			'Home' => array(
				'icon' => '<i class="fa fa-home fa-2x fa-fw"></i>',
				'keterangan' => 'Halaman Utama Admin',
				'keterangan1' => 'Halaman utama administrator untuk mengakses konten-konten yang tersedia di dalam website',
				'submenu' => false
			),
			'User' => array(
				'icon' => '<i class="fa fa-user fa-3x fa-fw"></i>',
				'keterangan' => 'Managemen Data Users',
				'keterangan1' => 'Pengaturan mengenai user administrator',
				'submenu' => array(
					'Data User',
					'Ubah Profile'
				)
			),
			'Manager' => array(
				'icon' => '<i class="fa fa-user fa-2x fa-fw"></i>',
				'keterangan' => 'Managemen Data Manager',
				'keterangan1' => 'Pengaturan mengenai Data Manager',
				'submenu' => array(
					'Data Manager'
				)
			),
		);
		return $menu;
	}
	
	public function displayMenu( $go ) {
		$menu = $this->menuArray();
		foreach ( $menu as $key => $val ) {
			if ( $val['submenu'] !== false ) {
				$a .= "<li><a href='javascript:void(0)'>{$val['icon']} <ul><li><strong>{$key}</strong></li><li class='ket'>{$val['keterangan']}</li></ul><span class='fa arrow'></span></a><ul class='nav nav-second-level'>";
				foreach ( $val['submenu'] as $key1 ) {
					if ($go === seo_title($key1)) {
						$a .= "<li class='active-submenu'><a href='?go=".seo_title($key1)."'><strong>{$key1}</strong></a></li>";
					} else {
						$a .= "<li><a href='?go=".seo_title($key1)."'><strong>{$key1}</strong></a></li>";
					}
				}
				$a .= "</ul></li>";
			} 
			else {
				if ($go === seo_title($key)) {
					$a .= "<li><a class='active-menu' href='?go=".seo_title($key)."'>{$val['icon']} <ul><li><strong>{$key}</strong></li><li class='ket'>{$val['keterangan']}</li></ul></a></li>";
				} else {
					$a .= "<li><a href='?go=".seo_title($key)."'>{$val['icon']} <ul><li><strong>{$key}</strong></li><li class='ket'>{$val['keterangan']}</li></ul></a></li>";
				}
			}
		}
		return $a;
	}
	
	public function judulPage( $go ) {
		$menu = $this->menuArray();
		foreach ( $menu as $key => $val ) {
			if ( $val['submenu'] !== false ) {
				foreach ( $val['submenu'] as $key1 ) {
					if ($go === seo_title($key1)) {
						$a .= "<h2>{$key1}</h2><h5>&rarr;&nbsp;{$val['keterangan1']}</h5>";
					}
				}
			} else {
				if ( $go === seo_title($key) ) {
					$a .= "<h2>{$key}</h2><h5>&rarr;&nbsp;{$val['keterangan1']}</h5>";
				}
			}
		}
		return $a;
	}	
}
?>
<?php
class DTB
{
		static function connectMySQL()
	{
		mysql_connect("localhost","root","");
		mysql_select_db("ojt") or die ("Database tidak ditemukan");
	}
}
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
//$user = antiinjection($_POST['user']);
//$password = antiinjection(md5($_POST['password']));

class user
{
	static function cek_login($user,$password)
	{
		$result=mysql_query("select * from user where user='$user' and password='$password'");
		$user_data=mysql_fetch_array($result);
		$jumlah=mysql_num_rows($result);
		if($jumlah == 1)
		{
			$_SESSION['login']= TRUE ;
			$_SESSION['id']=$user_data[iduser];
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function logout()
	{
		$_SESSION['login']=FALSE;
		session_destroy();
		unset($_SESSION['login']);
	}
	static function get_sesi()
	{
		return $_SESSION['login'];
	}
}
class tamu
{
	static function cmb($tanggal,$nama,$alamat,$kota,$jam,$telp)
	{
		$result=mysql_query("INSERT into cmb values('','$tanggal','$nama','$alamat','$kota','$jam','$telp','0')");
		if($result){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>