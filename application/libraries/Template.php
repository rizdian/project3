<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    private $data;
    private $js_file;
    private $css_file;
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('ion_auth');
        $this->CI->load->model('Peminjaman_model');

        // default CSS and JS that they must be load in any pages
        $this->addJS( base_url('template/adminlte/bower_components/jquery/dist/jquery.min.js') );
        $this->addJS( base_url('template/adminlte/bower_components/jquery-ui/jquery-ui.min.js') );
        $this->addJS( base_url('template/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') );
        $this->addJS( base_url('template/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') );
        $this->addJS( base_url('template/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') );
        $this->addJS( base_url('template/adminlte/bower_components/fastclick/lib/fastclick.js') );
        $this->addJS( base_url('template/adminlte/dist/js/adminlte.min.js') );
        $this->addJS( base_url('template/adminlte/dist/js/demo.js') );
        $this->addJS( base_url('template/adminlte/bower_components/moment/min/moment.min.js') );
        $this->addJS( base_url('template/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') );

        $this->addCSS( base_url('template/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') );
        $this->addCSS( base_url('template/adminlte/bower_components/font-awesome/css/font-awesome.min.css') );
        $this->addCSS( base_url('template/adminlte/dist/css/AdminLTE.min.css') );
        $this->addCSS( base_url('template/adminlte/dist/css/skins/_all-skins.min.css') );
        $this->addCSS( base_url('template/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') );

        $this->addCSS( base_url('template/adminlte/bower_components/Ionicons/css/ionicons.min.css') );
        $this->addCSS( base_url('template/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') );
    }

    public function show( $folder, $page, $data=null, $menu=true )
    {
        if (!$this->CI->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        if ( ! file_exists('application/views/'.$folder.'/'.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            $isLogin = $this->CI->ion_auth->user()->row()->user_id;
            $getUser = $this->CI->Karyawan_model->get_by_id($isLogin);

            $this->data['page_header'] = $getUser;
            $this->data['page_var'] = $data;
            $this->load_JS_and_css();
            $this->init_menu();

            if ($menu){
                $this->data['header'] = $this->CI->load->view('layout/header.php', $this->data, true);
                $this->data['sidebar'] = $this->CI->load->view('layout/sidebar.php', $this->data, true);
                $this->data['footer'] = $this->CI->load->view('layout/footer.php', $this->data, true);
            }
            $this->data['content'] = $this->CI->load->view($folder.'/'.$page.'.php', $this->data, true);
            $this->CI->load->view('layout/base_template.php', $this->data);
        }
    }

    public function addJS( $name )
    {
        $js = new stdClass();
        $js->file = $name;
        $this->js_file[] = $js;
    }

    public function addCSS( $name )
    {
        $css = new stdClass();
        $css->file = $name;
        $this->css_file[] = $css;
    }

    private function load_JS_and_css()
    {
        $this->data['html_head'] = '';
        $this->data['js_file'] = '';

        if ( $this->css_file )
        {
            foreach( $this->css_file as $css )
            {
                $this->data['html_head'] .= "<link rel='stylesheet' type='text/css' href=".$css->file.">". "\n";
            }
        }

        if ( $this->js_file )
        {
            foreach( $this->js_file as $js )
            {
                $this->data['js_file'] .= "<script type='text/javascript' src=".$js->file."></script>". "\n";
            }
        }
    }

    private function init_menu()
    {
        // your code to init menus
        // it's a sample code you can init some other part of your page
    }
}