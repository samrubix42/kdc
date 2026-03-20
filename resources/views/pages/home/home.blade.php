<?php

use Livewire\Component;
use App\Models\Blog;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;

new class extends Component
{
    public function with(): array
    {
        return [
            'blogs' => Blog::where('is_active', true)
                ->latest()
                ->take(3)
                ->get(),
            'projects' => Project::with(['images', 'category'])
                ->latest()
                ->take(3)
                ->get(),
            'categories' => ProjectCategory::take(3)->get(),
        ];
    }
};
?>
@section('meta_title', 'KDC Consultants | Architecture, Interiors & Project Delivery')
@section('meta_description', 'KDC Consultants delivers architecture, interiors, and project management services with over two decades of expertise across residential, commercial, and industrial sectors.')
@section('meta_keywords', 'KDC Consultants, architecture firm, interior design, project management, industrial architecture, residential design')

<style>
    #home .rev_slider .slotholder {
        position: relative;
    }

    #home .rev_slider .slotholder::before {
        content: '';
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.10);
        pointer-events: none;
        z-index: 2;
    }

    #home .rev_slider .tp-bgimg,
    #home .rev_slider .rev-slidebg {
        box-shadow: inset 0 0 0 9999px rgba(0, 0, 0, 0.22) !important;
    }
</style>

<div>
    <main id="home" class="jumbotron">

        <!-- Start revolution slider -->

        <div class="rev_slider_wrapper">
            <div id="rev_slider" class="rev_slider tp-overflow-hidden fullscreenbanner">
                <ul>

                    <!-- Slide 1 -->

                    <li data-transition='slideleft' data-slotamount='default' data-masterspeed="1000" data-fsmasterspeed="1000">

                        <!-- Main image-->

                        <img src="{{ asset('building/Gemini_Generated_Image_jt6fgqjt6fgqjt6f.jpg') }}" data-bgparallax="5" alt="Corporate Building Sketch" data-bgposition="center 0" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <!-- Layer 1 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['-250']" data-width="270" data-height="5" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>

                        <!-- Layer 2 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['370']" data-y="['middle','middle','middle','middle']" data-voffset="['19']" data-width="5" data-height="544" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":600,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>


                        <!-- Layer 3 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['289']" data-width="270" data-height="5" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":1200,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>


                        <!-- Layer 4 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['19']" data-width="5" data-height="544" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":1800,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>

                        <!-- Layer 5 -->

                        <div class="slider-title tp-caption tp-resizeme" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['-30']" data-textalign="['left']" data-fontsize="['72', '63','57','50']" data-lineheight="['72','68', '62','54']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; color:white; letter-spacing:-0.05em;">Designing<br>
                            Iconic Corporate<br>
                            Landmarks
                        </div>


                        <!-- Layer 6 -->

                        <div class="slider-title tp-caption" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['-170']" data-textalign="['left']" data-fontsize="['18']" data-lineheight="['20']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; letter-spacing:0.1em; text-transform:uppercase;">Corporate
                        </div>

                        <!-- Layer 7 -->

                        <div class="slider-title tp-caption" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['230']" data-textalign="['left']" data-fontsize="['18']" data-lineheight="['20']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-105%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600;">
                            <a href="" class="link-arrow">See project <i class="icon ion-ios-arrow-thin-right"></i>
                            </a>
                        </div>
                    </li>

                    <!-- Slide 2 -->

                    <li data-transition='slideleft' data-slotamount='default' data-masterspeed="1000" data-fsmasterspeed="1000">

                        <!-- Main image-->

                        <img src="{{ asset('building/modern_corporate_sketch.png') }}" data-bgparallax="5" alt="Modern Architecture Sketch" data-bgposition="center 0" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <!-- Layer 1 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['-250']" data-width="270" data-height="5" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>

                        <!-- Layer 2 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['370']" data-y="['middle','middle','middle','middle']" data-voffset="['19']" data-width="5" data-height="544" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":600,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>


                        <!-- Layer 3 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['289']" data-width="270" data-height="5" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":1200,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>


                        <!-- Layer 4 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['19']" data-width="5" data-height="544" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":1800,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>

                        <!-- Layer 5 -->

                        <div class="slider-title tp-caption tp-resizeme" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['-30']" data-textalign="['left']" data-fontsize="['72', '63','57','50']" data-lineheight="['72','68', '62','54']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; letter-spacing:-0.05em;">Modern<br> Minimalist<br> Design
                        </div>


                        <!-- Layer 6 -->

                        <div class="slider-title tp-caption" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['-170']" data-textalign="['left']" data-fontsize="['18']" data-lineheight="['20']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; letter-spacing:0.1em; text-transform:uppercase;">Architecture
                        </div>

                        <!-- Layer 7 -->

                        <div class="slider-title tp-caption" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['230']" data-textalign="['left']" data-fontsize="['18']" data-lineheight="['20']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-105%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; ">
                            <a href="" class="link-arrow">See project <i class="icon ion-ios-arrow-thin-right"></i>
                            </a>
                        </div>
                    </li>

                    <!-- Slide 3 -->

                    <li data-transition='slideleft' data-slotamount='default' data-masterspeed="1000" data-fsmasterspeed="1000">

                        <!-- Main image-->

                        <img src="{{ asset('building/Gemini_Generated_Image_jt6fgqjt6fgqjt6f.jpg') }}" data-bgparallax="5" alt="Construction Sketch" data-bgposition="center 0" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">

                        <!-- Layer 1 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['-250']" data-width="270" data-height="5" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>

                        <!-- Layer 2 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['370']" data-y="['middle','middle','middle','middle']" data-voffset="['19']" data-width="5" data-height="544" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":600,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>


                        <!-- Layer 3 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['289']" data-width="270" data-height="5" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"x:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":1200,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>


                        <!-- Layer 4 -->

                        <div class="tp-caption tp-shape tp-shapewrapper  tp-resizeme" data-x="['left']" data-hoffset="['100']" data-y="['middle','middle','middle','middle']" data-voffset="['19']" data-width="5" data-height="544" data-whitespace="nowrap" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1000,"to":"o:1;","delay":1800,"ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]' data-textalign="['left','left','left','left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="background-color:#cee002;"> </div>

                        <!-- Layer 5 -->

                        <div class="slider-title tp-caption tp-resizeme" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['-30']" data-textalign="['left']" data-fontsize="['72', '63','57','50']" data-lineheight="['72','68', '62','54']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; letter-spacing:-0.05em;">Transforming<br> Industrial<br> Landscapes
                        </div>


                        <!-- Layer 6 -->

                        <div class="slider-title tp-caption" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['-170']" data-textalign="['left']" data-fontsize="['18']" data-lineheight="['20']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[155%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1000" data-splitin="chars" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; letter-spacing:0.1em; text-transform:uppercase;">Industrial
                        </div>

                        <!-- Layer 7 -->

                        <div class="slider-title tp-caption" data-x="['left']" data-hoffset="['156']" data-y="['middle','middle','middle','middle']" data-voffset="['230']" data-textalign="['left']" data-fontsize="['18']" data-lineheight="['20']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-105%];z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:50px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-splitin="none" data-splitout="none" data-responsive_offset="on" data-elementdelay="0.05" style="font-weight:600; ">
                            <a href="" class="link-arrow">See project <i class="icon ion-ios-arrow-thin-right"></i>
                            </a>
                        </div>
                    </li>

           
                </ul>
            </div>
        </div>
    </main>

    <div class="content">

        <!-- Section About -->

        <section id="profile" class="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="section-subtitle">ARCHITECTURE & INTERIORS</strong>
                        <h2 class="section-title section-about-title">An Introduction</h2>
                        <p><img src="{{ asset('images/kdc-5.png') }} " style="height: 30px;" alt="KDC Logo"> is a revolutionary emergence in the field of architectural assignments formulated on the ethics of Professionalism and to create versatility with a young and dynamic team of professional acumen who have been dedicated over so many years in this industry.</p>
                        <p style="margin-top: 15px; color: #555; line-height: 1.8;">As an ISO 9001:2015 URS certified organization, we hold ourselves to the highest standards of planning, precision, and execution. Whether navigating comprehensive master planning, innovative interior design, or robust structural engineering, our multi-disciplinary approach ensures every project not only meets but vastly exceeds our clients' functional and aesthetic aspirations.</p>

                        <div class="experience-box">
                            <div class="experience-border"></div>
                            <div class="experience-content">
                                <div class="experience-number">26</div>
                                <div class="experience-info wow fadeInDown">Years<br>Experience<br>Working</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <div class="dots-image">
                            <img alt="" class="about-img img-responsive" src="{{ asset('building/19112.jpg') }}">
                            <div class="dots"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Services Preview -->
        <section id="services-preview" class="section" style="background-color: #1a4276; padding: 90px 0; position: relative;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: 0;">
                <div style="position: absolute; bottom: -50px; right: -50px; width: 300px; height: 300px; background-color: #95BF19; border-radius: 50%; opacity: 0.1;"></div>
                <div style="position: absolute; top: -50px; left: -50px; width: 200px; height: 200px; background-color: #cee002; border-radius: 50%; opacity: 0.05;"></div>
            </div>
            
            <div class="container" style="position: relative; z-index: 1;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center" style="margin-bottom: 60px;">
                        <strong class="section-subtitle" style="color: #95BF19; letter-spacing: 2px;">WHAT WE DO</strong>
                        <h2 class="section-title section-about-title" style="color: #fff; border-bottom: none; padding-bottom: 0; margin-bottom: 25px; font-weight: 300; font-size: 42px;">Comprehensive Project Delivery</h2>
                        <div style="width: 60px; height: 3px; background: #95BF19; margin: 0 auto 25px;"></div>
                        <p style="color: rgba(255,255,255,0.7); font-size: 16px; line-height: 1.8;">We manage every aspect of the project lifecycle across three distinct stages, ensuring technical purity, efficient coordination, and flawless execution from concept to completion.</p>
                    </div>
                </div>

                <div class="row" style="display: flex; flex-wrap: wrap;">
                    <!-- Service 1 -->
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                        <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 45px 35px; border-radius: 8px; height: 100%; transition: transform 0.3s ease, background 0.3s ease;" onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.transform='translateY(0)';">
                            <div style="width: 65px; height: 65px; background: #95BF19; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px; box-shadow: 0 10px 20px rgba(149,191,25,0.3);">
                                <i class="ion-ios-paper-outline" style="color: #1a4276; font-size: 34px;"></i>
                            </div>
                            <h3 style="color: #fff; font-size: 22px; font-weight: 600; margin-top: 0; margin-bottom: 20px;">Stage I: Planning</h3>
                            <p style="color: rgba(255,255,255,0.6); line-height: 1.7; margin-bottom: 30px; font-size: 14.5px;">Site investigation, soil resistivity, master planning, architectural planning, and precise 3D conceptualization to build a solid foundation.</p>
                            <a href="{{ route('service') }}" style="color: #95BF19; font-weight: 600; text-decoration: none; text-transform: uppercase; font-size: 13px; letter-spacing: 1px;">Discover More <i class="ion-ios-arrow-thin-right" style="margin-left:5px;"></i></a>
                        </div>
                    </div>
                    
                    <!-- Service 2 -->
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                        <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 45px 35px; border-radius: 8px; height: 100%; transition: transform 0.3s ease, background 0.3s ease;" onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.transform='translateY(0)';">
                            <div style="width: 65px; height: 65px; background: #95BF19; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px; box-shadow: 0 10px 20px rgba(149,191,25,0.3);">
                                <i class="ion-ios-color-wand-outline" style="color: #1a4276; font-size: 34px;"></i>
                            </div>
                            <h3 style="color: #fff; font-size: 22px; font-weight: 600; margin-top: 0; margin-bottom: 20px;">Stage II: Engineering</h3>
                            <p style="color: rgba(255,255,255,0.6); line-height: 1.7; margin-bottom: 30px; font-size: 14.5px;">MEP systems, interior design layouts, HVAC networks, bill of quantities (BOQ), and highly detailed tender documentation.</p>
                            <a href="{{ route('service') }}" style="color: #95BF19; font-weight: 600; text-decoration: none; text-transform: uppercase; font-size: 13px; letter-spacing: 1px;">Discover More <i class="ion-ios-arrow-thin-right" style="margin-left:5px;"></i></a>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
                        <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 45px 35px; border-radius: 8px; height: 100%; transition: transform 0.3s ease, background 0.3s ease;" onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.transform='translateY(0)';">
                            <div style="width: 65px; height: 65px; background: #95BF19; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 30px; box-shadow: 0 10px 20px rgba(149,191,25,0.3);">
                                <i class="ion-ios-gear-outline" style="color: #1a4276; font-size: 34px;"></i>
                            </div>
                            <h3 style="color: #fff; font-size: 22px; font-weight: 600; margin-top: 0; margin-bottom: 20px;">Stage III: Management</h3>
                            <p style="color: rgba(255,255,255,0.6); line-height: 1.7; margin-bottom: 30px; font-size: 14.5px;">Robust project management, strict quality assurance, extensive site supervision, and flawless handover of the completed build.</p>
                            <a href="{{ route('service') }}" style="color: #95BF19; font-weight: 600; text-decoration: none; text-transform: uppercase; font-size: 13px; letter-spacing: 1px;">Discover More <i class="ion-ios-arrow-thin-right" style="margin-left:5px;"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="row" style="margin-top: 30px;">
                    <div class="col-sm-12 text-center">
                         <a href="{{ route('service') }}" class="btn" style="background: #95BF19; border: 2px solid #95BF19; color: #1a4276; font-weight: 700; padding: 14px 40px; border-radius: 4px; font-size: 15px; transition: all 0.3s ease; text-transform: uppercase; letter-spacing: 1px; display: inline-block;">View Full Scope of Services</a>
                    </div>
                </div>
            </div>
        </section>



        <!-- Section Projects -->

        <section id="projects" class="section-projects section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <h2 class="section-title">Latest Projects</h2>
                    </div>
                    <div class="col-lg-7">
                        <div class="filter-content">
                            <ul class="filter-carousel filter pull-lg-right js-filter-carousel">
                                <li class="active"><a href="#" class="all" data-filter="*">All</a></li>
                                @foreach($categories as $category)
                                    <li><a href="#" data-filter=".{{ Str::slug($category->name) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            <a href="{{ route('project') }}" class="view-projects">View All Projects</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-carousel owl-carousel">
                @forelse($projects as $project)
                    @php
                       $categoryClass = $project->category ? Str::slug($project->category->name) : 'building';
                       $firstImage = $project->images->first();
                       $imageUrl = $firstImage ? Storage::url($firstImage->image_path) : asset('images/projects/1-426x574.jpg');
                    @endphp
                    <div class="project-item item-shadow {{ $categoryClass }}">
                        <img alt="{{ $project->title }}" class="img-responsive" src="{{ $imageUrl }}" style="height: 574px; object-fit: cover; width: 100%;">
                        <div class="project-hover">
                            <div class="project-hover-content">
                                <h3 class="project-title">{!! nl2br(e($project->title)) !!}</h3>
                                <p class="project-description">{{ Str::limit(strip_tags($project->description), 110) }}</p>
                            </div>
                        </div>
                        <a href="{{ route('project.detail', $project->slug) }}" class="link-arrow">See project <i class="icon ion-ios-arrow-right"></i></a>
                    </div>
                @empty
                    <!-- Placeholder projects if none exist -->
                    <div class="project-item item-shadow building">
                        <img alt="Placeholder" class="img-responsive" src="{{ asset('images/projects/1-426x574.jpg') }}">
                        <div class="project-hover">
                            <div class="project-hover-content">
                                <h3 class="project-title">Corporate<br>Headquarters<br>Design</h3>
                                <p class="project-description">Explore our visionary corporate center focusing on sustainable planning and state-of-the-art office spaces.</p>
                            </div>
                        </div>
                        <a href="#" class="link-arrow">See project <i class="icon ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="project-item item-shadow interior-exterior">
                        <img alt="Placeholder" class="img-responsive" src="{{ asset('images/projects/2-426x574.jpg') }}">
                        <div class="project-hover">
                            <div class="project-hover-content">
                                <h3 class="project-title">Luxury<br>Residential<br>Villa</h3>
                                <p class="project-description">A beautiful showcase of exquisite interior design and landscape architecture complementing premium living.</p>
                            </div>
                        </div>
                        <a href="#" class="link-arrow">See project <i class="icon ion-ios-arrow-right"></i></a>
                    </div>
                    <div class="project-item item-shadow building">
                        <img alt="Placeholder" class="img-responsive" src="{{ asset('images/projects/3-426x574.jpg') }}">
                        <div class="project-hover">
                            <div class="project-hover-content">
                                <h3 class="project-title">Industrial<br>Logistics<br>Park</h3>
                                <p class="project-description">High-capacity operations and modern aesthetic solutions integrated to optimize large scale distribution flows.</p>
                            </div>
                        </div>
                        <a href="#" class="link-arrow">See project <i class="icon ion-ios-arrow-right"></i></a>
                    </div>
                @endforelse
            </div>
        </section>

        <!-- Section Clients -->

        <!-- Section CEO Message -->

        <section class="section-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="dots-image">
                            <img alt="Mr. Vijay Kachroo" class="about-img img-responsive" src="{{ asset('images/kachroo.jpg') }}">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-1">
                        <strong class="section-subtitle">MESSAGE FROM CEO</strong>
                        <h2 class="section-title section-about-title">KDC Team</h2>
                        <p><img src="{{ asset('images/kdc-5.png') }}" style="height: 20px;" alt="Signature"> Consultants was founded by its Principal Architect, Vijay Kachroo, who in the field has more than two decades of rich experience. Prior to incorporation of <img src="{{ asset('images/kdc-5.png') }}" style="height: 20px;"> Consultants, Vijay Kachroo was managing the Company under the name of "Archivision". We have about two decades of working experience in the institutional, industrial and luxury residential market.</p>
                        <p><strong>Mr. Vijay Kachroo</strong><br>Principal Architect, the backbone of the Organization. As a Project Leader, he looks after the overall development of the project, starting from the conceptualization stage up till the handing over of each project.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="clients" class="section-clients section bg-dots">
            <div class="container">
                <h2 class="section-title">From Great Our Clients</h2>
                <div class="client-carousel owl-carousel">
                    <div class="client-carousel-item">
                        <div class="client-box">
                            <img alt="" class="image-quote" src="{{ asset('images/image-icons/icon-quote.png') }}">
                            <div class="client-title">
                                <span class="client-name">Rohit Mehta</span>
                                <span class="client-company">/ Director, Mehta Infrastructure Pvt. Ltd.</span>
                            </div>
                            <p class="client-description">KDC delivered exactly what we envisioned for our corporate office in Gurgaon. The planning, execution, and attention to detail were exceptional from concept to handover.</p>
                        </div>
                    </div>
                    <div class="client-carousel-item">
                        <div class="client-box">
                            <img alt="" class="image-quote" src="{{ asset('images/image-icons/icon-quote.png') }}">
                            <div class="client-title">
                                <span class="client-name">Neha Kapoor</span>
                                <span class="client-company">/ Founder, Kapoor Lifestyle Homes</span>
                            </div>
                            <p class="client-description">Our luxury residence in South Delhi was designed with elegance and practicality. The team remained professional, transparent, and highly responsive throughout the project.</p>
                        </div>
                    </div>
                    <div class="client-carousel-item">
                        <div class="client-box">
                            <img alt="" class="image-quote" src="{{ asset('images/image-icons/icon-quote.png') }}">
                            <div class="client-title">
                                <span class="client-name">Sanjay Verma</span>
                                <span class="client-company">/ Operations Head, Verma Auto Components</span>
                            </div>
                            <p class="client-description">The industrial facility designed by KDC improved workflow efficiency and safety standards significantly. Their technical understanding and site coordination were excellent.</p>
                        </div>
                    </div>
                    <div class="client-carousel-item">
                        <div class="client-box">
                            <img alt="" class="image-quote" src="{{ asset('images/image-icons/icon-quote.png') }}">
                            <div class="client-title">
                                <span class="client-name">Priya Nair</span>
                                <span class="client-company">/ Trustee, Nair Education Foundation</span>
                            </div>
                            <p class="client-description">KDC handled our institutional campus project with great commitment and creativity. Timelines were met, and the final outcome exceeded our expectations.</p>
                        </div>
                    </div>
                </div>
                <div class="partner-carousel owl-carousel">
                    @php
                    $partnerImages = collect(\Illuminate\Support\Facades\File::files(public_path('images/partner')))
                    ->sortBy(fn ($file) => $file->getFilename(), SORT_NATURAL | SORT_FLAG_CASE)
                    ->values();
                    @endphp
                    @foreach ($partnerImages as $partnerImage)
                    <div class="partner-carousel-item">
                        <img alt="{{ pathinfo($partnerImage->getFilename(), PATHINFO_FILENAME) }}" style="filter:grayscale(100%) !important;" src="{{ asset('images/partner/' . $partnerImage->getFilename()) }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Section News -->

        <section class="section-news section">
            <div class="container">
                <h2 class="section-title">Latest Blog <a href="{{ route('blog') }}" class="link-arrow-2 pull-right">All Articles <i class="icon ion-ios-arrow-right"></i></a></h2>
                <div class="news-carousel owl-carousel">
                    @forelse($blogs as $blog)
                        <div class="news-item">
                            <img alt="{{ $blog->title }}" src="{{ $blog->image ? Storage::url($blog->image) : asset('images/news/1-370x370.jpg') }}">
                            <div class="news-hover">
                                <div class="hover-border">
                                    <div></div>
                                </div>
                                <div class="content">
                                    <div class="time">{{ $blog->created_at?->format('M jS, Y') }}</div>
                                    <h3 class="news-title">{{ $blog->title }}</h3>
                                    <p class="news-description">{{ $blog->description ?: Str::limit(strip_tags($blog->content), 110) }}</p>
                                </div>
                                <a class="read-more" href="{{ route('blog.detail', $blog->slug) }}">Continue</a>
                            </div>
                        </div>
                    @empty
                        <div class="news-item">
                            <img alt="No blog posts" src="{{ asset('images/news/1-370x370.jpg') }}">
                            <div class="news-hover">
                                <div class="hover-border">
                                    <div></div>
                                </div>
                                <div class="content">
                                    <div class="time">Latest</div>
                                    <h3 class="news-title">No blog posts found</h3>
                                    <p class="news-description">Please check back soon for new articles.</p>
                                </div>
                                <a class="read-more" href="{{ route('blog') }}">View Blog</a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</div>
