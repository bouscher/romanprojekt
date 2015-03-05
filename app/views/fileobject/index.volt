{% include 'partials/flash-messages.volt' %}
{{ content() }}
{%- if session.get('auth') -%}
<div id="main-content" class="main">
<h3>die Sitzungen: Klick auf eine Sitzung, dann kann du sie anhören und die Stellen mit Hashtags und kommentaren versehen</h3>
<div class="ap-wrapper center-ap" style="width:100%;">
    <ul id="filelist">
 {% for file in files %}
 <li><a href="{{baseurl}}fileobject/update/{{file.uid}}">{{file.description}} - {{date('d.m.Y',file.crdate)}}</a></li>

 {% endfor %}
</ul>

</div>
<input type="hidden" value="{{feuserName}}" id="feuserName">
<input type="hidden" value="{{ baseurl }}{{feuserIcon}}" id="feuserIcon">
<input type="hidden" value="{{ baseurl }}" id="baseurl">
{% endif %}