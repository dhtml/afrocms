<?php
class Welcome extends Controller {
        public function index()
        {
          //stdout($this->config->set_item('theme_front','bootstrap'));
          //stdout($this->config->item('theme_front'));

          $this->assign('date','Today is '.date('F j, Y h:i:s'));
        }

        public function test()
        {
          echo "This is a test page";
        }
}
