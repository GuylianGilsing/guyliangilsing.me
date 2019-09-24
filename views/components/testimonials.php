<?php
    class Testimonials
    {
        public $previewAmount = 3;
        public $showPreview = false;
        private $testimonials = [];

        public function Render()
        {
            $count = 0;
            echo '<div id="component-testimonials">';
                if(count($this->testimonials) > 0)
                {
                    foreach($this->testimonials as $testimonial)
                    {
                        if($this->showPreview)
                            $count += 1;

                        echo '
                            <div class="testimonial-card col-1-3 col-s-100 col-xs-100 center">
                                <h4 class="name">'.$testimonial['name'].'</h4>
                                <p class="message">'.$testimonial['message'].'</p>
                                <div class="bottom">
                                    <p class="company">'.$testimonial['company'].'</p>
                                </div>
                            </div>
                        ';
    
                        if($count >= $this->previewAmount && $this->showPreview)
                            break;
                    }
                }
                else
                {
                    echo '<p class="notfound-message">No testimonials found.</p>';
                }
            echo '</div>';
        }

        /**
         * Registers new testimonial data.
         * @param $array An array that holds the testimonial data: ['name' => "", 'message' => "", 'company' => ""]
         */
        public function RegisterTestimonial($array)
        {
            $this->testimonials[] = $array;
        }
    }

?>