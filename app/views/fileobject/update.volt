{% include 'partials/flash-messages.volt' %}
{{ content() }}
{%- if session.get('auth') -%}
<div id="main-content" class="main">
<h3>{{file.description}} - {{date('d.m.Y',file.crdate)}}</h3>
<div class="ap-wrapper center-ap" style="width:100%;">

 
<div id="ag_{{file.uid}}" class="audiogallery" style="opacity:0; margin-top: 70px;">
<div class="items">
    
    
        <div class="audioplayer-tobe" style="width:100%; " data-scrubbg="{{ baseurl }}public/res/bg.png" data-scrubprog="{{ baseurl }}public/res/prog.png" data-videoTitle="{{file.title}}" data-type="normal" data-source="{{ baseurl }}public/res/{{file.filepath}}">            
            <div class="menu-description">                
                <span class="the-artist">{{ file.title }}</span>                
                <p>{{file.description}}</p>
            </div>
        </div>
    
    
    </div>
</div>
 


</div>
<div id="hashtags">
    <h3>Bisher verwendete Hashtags alphabetisch geordnet. </h3>
    <p>
        {% for hashtag in hashtags %}
            {{hashtag.title}},
        {% endfor %}
    </p>
    
</div>
<input type="hidden" value="{{feuserName}}" id="feuserName">
<input type="hidden" value="{{ baseurl }}{{feuserIcon}}" id="feuserIcon">
<input type="hidden" value="{{ baseurl }}" id="baseurl">
</div>
{% endif %}