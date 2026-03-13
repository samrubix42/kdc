<?php

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    public $project;

    public function mount($slug)
    {
        $this->project = Project::with([
            'category',
            'images' => fn ($query) => $query->orderByDesc('is_primary')->orderBy('id'),
        ])->where('slug', $slug)->firstOrFail();
    }
};
?>

<div>
    <div class="content">   
      <div class="project-detail">
        <div class="slider-prev icon-chevron-left hidden-xs"></div>
        <div class="slider-next icon-chevron-right hidden-xs"></div>

        <div class="rev_slider_wrapper">
          <div id="rev_slider2" class="rev_slider tp-overflow-hidden fullscreenbanner">
            <ul>
              @php
                $slides = $project->images;
              @endphp

              @if($slides->isEmpty())
                <li data-transition="slideleft" data-masterspeed="1200" data-fsmasterspeed="1200">
                  <img src="{{ asset('images/projects/1-1920x1080.jpg') }}" alt="{{ $project->title }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                  <div class="tp-caption tp-shape tp-shapewrapper" data-x="['left']" data-hoffset="['0']" data-y="['top']" data-voffset="['50','50','40','40']" data-width="528" data-minwidth="528" data-whitespace="normal" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"opacity:0;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":400,"to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textalign="['left','left','left','left']">
                    <div class="project-detail-info">
                      <div class="project-detail-control"><span class="hide-info">hide information</span><span class="show-info">show information</span></div>
                      <div class="project-detail-content">
                        <h3 class="project-detail-title">{{ $project->title }}</h3>
                        <p class="project-detail-text">{{ $project->description }}</p>
                        <ul class="project-detail-list text-dark">
                          <li><span class="left">Clients:</span><span class="right">{{ $project->clients ?: '-' }}</span></li>
                          <li><span class="left">Completion:</span><span class="right">{{ optional($project->completion_date)->format('F jS, Y') ?: '-' }}</span></li>
                          <li><span class="left">Project Type:</span><span class="right">{{ $project->category?->name ?: '-' }}</span></li>
                          <li><span class="left">Architects:</span><span class="right">{{ $project->architects ?: '-' }}</span></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              @else
                @foreach($slides as $image)
                  <li data-transition="slideleft" data-masterspeed="1200" data-fsmasterspeed="1200">
                    <img src="{{ Storage::url($image->image_path) }}" alt="{{ $project->title }}" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
                    <div class="tp-caption tp-shape tp-shapewrapper" data-x="['left']" data-hoffset="['0']" data-y="['top']" data-voffset="['50','50','40','40']" data-width="528" data-minwidth="528" data-whitespace="normal" data-type="shape" data-responsive_offset="on" data-frames='[{"from":"opacity:0;z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;","speed":1500,"to":"o:1;","delay":0,"ease":"Power3.easeInOut"},{"delay":"wait","speed":400,"to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textalign="['left','left','left','left']">
                      <div class="project-detail-info">
                        <div class="project-detail-control"><span class="hide-info">hide information</span><span class="show-info">show information</span></div>
                        <div class="project-detail-content">
                          <h3 class="project-detail-title">{{ $project->title }}</h3>
                          <p class="project-detail-text">{{ $project->description }}</p>
                          <ul class="project-detail-list text-dark">
                            <li><span class="left">Clients:</span><span class="right">{{ $project->clients ?: '-' }}</span></li>
                            <li><span class="left">Completion:</span><span class="right">{{ optional($project->completion_date)->format('F jS, Y') ?: '-' }}</span></li>
                            <li><span class="left">Project Type:</span><span class="right">{{ $project->category?->name ?: '-' }}</span></li>
                            <li><span class="left">Architects:</span><span class="right">{{ $project->architects ?: '-' }}</span></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
      </div>
    </div>
</div>
