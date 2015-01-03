{% include 'partials/flash-messages.volt' %}
{{ content() }}
{%- if session.get('auth') -%}
<div id="main-content" class="main">
<h1>die Sitzungen: Mitschnitte</h1>
<div class="ap-wrapper center-ap" style="width:100%;">

 {% for file in files %}
<div id="ag_{{file.uid}}" class="audiogallery" style="opacity:0; margin-top: 70px;">
<div class="items">
    
    
        <div class="audioplayer-tobe" style="width:100%; " data-scrubbg="{{ baseurl }}public/res/{{file.title}}_bg.png" data-scrubprog="{{ baseurl }}public/res/{{file.title}}_prog.png" data-videoTitle="{{file.title}}" data-type="normal" data-source="{{ baseurl }}{{file.filepath}}">            
            <div class="menu-description">                
                <span class="the-artist">{{ file.title }}</span>                
                <p>{{file.description}}</p>
            </div>
        </div>
    
    
    </div>
</div>
 {% endfor %}


</div>
<input type="hidden" value="{{feuserName}}" id="feuserName">
<input type="hidden" value="{{ baseurl }}{{feuserIcon}}" id="feuserIcon">
{% endif %}