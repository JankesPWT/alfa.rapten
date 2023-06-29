{# TODO: hints on hover #}

{% extends 'template/base.php' %}

{% block title %}Wykonawcy | Rapten.pl{% endblock %}

{% block main %}

    {# @VARIABLES@ #}
    
    {# {% set selectedYear = 'now' | date('Y') %} #}

<div class="index">
    {# {{ dump(fields) }}
    {{ dump(errors) }} #}
    <form action="/artist/create" method="post" enctype="multipart/form-data">
        
        <div class="form-fields">
            <label for="ksywa">Ksywa</label>
            <input type="text" name="ksywa" value="{{fields.ksywa}}" minlength="2" maxlength="100" placeholder="Ksywa" autofocus required>
            <span class="tooltip">?
                <span class="tooltiptext"></span>
            </span>
            {% if errors.ksywa is not empty %}
            <div class="error">{{ errors.ksywa }}</div>
            {% endif %}
            
            <label for="ksywa">Imię</label>
            <input type="text" name="imie" value="{{fields.imie}}" minlength="2" maxlength="50" placeholder="Imię" />

            <label for="ksywa">Nazwisko</label>
            <input type="text" name="nazwisko" value="{{fields.nazwisko}}" minlength="2" maxlength="50" placeholder="Nazwisko"/>
            
            <label for="ksywa">Miasto</label>
            <input type="text" name="miasto" value="{{fields.miasto}}" minlength="2" maxlength="50" placeholder="Wpisujcie miasta" />
            
            <label for="dob">Data urodzenia</label>
            <div>
            <select name="rok">
                <option value="0">rok</option>
                {% for year in ("now"|date_modify("+5 years")|date("Y"))..1940 %}
                    {% set selected = (year == fields.rok) ? 'selected' : '' %}
                    <option value="{{ year }}" {{ selected }}>{{ year }}</option>
                {% endfor %}
            </select>
            
            <select name="miesiac">
                <option value="0">miesiąc</option>
                <option value="0">nie wiem</option>
                {% for month in 1..12 %}
                    {% set selected = (month == fields.miesiac) ? 'selected' : '' %}
                    <option value="{{ month }}" {{ selected }}>{{ month }}</option>
                {% endfor %}
            </select>

            <select name="dzien">
                <option value="0">dzień</option>
                <option value="0">nie wiem</option>
                {% for day in 1..31 %}
                    {% set selected = (day == fields.dzien) ? 'selected' : '' %}
                    <option value="{{ day }}" {{ selected }}>{{ day }}</option>
                {% endfor %}
            </select>
            <span class="tooltip">?
                <span class="tooltiptext">Jeśli znasz tylko rok urodzenia, wpisz tylko rok.<br><br>Trudno...<br><br> Rok i miesiąc też zaakceptujemy.</span>
            </span>
            </div>
            {% if errors.rok is not empty %}
            <div class="error">{{ errors.rok }}</div>
            {% endif %}

            <label for="aka">AKA</label>
            <input type="text" name="aka" value="{{fields.aka}}" minlength="2"  maxlength="50" placeholder="Znany także jako... (po przecinku)"/>
            
            <label for="strona">Strona www</label>
            <input type="url" name="strona" value="{{fields.strona}}" minlength="2" maxlength="50" placeholder="Strona WWW" value=""/>
            {% if errors.strona is not empty %}
            <div class="error">{{ errors.strona }}</div>
            {% endif %}

            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" value="{{fields.facebook}}" minlength="2" maxlength="50" placeholder="Facebook" value=""/>
            
            <label for="instagram">Instagram</label>
            <input type="text" name="instagram" value="{{fields.instagram}}" minlength="2" maxlength="50" placeholder="Instagram (@ksywa)" value=""/>

            <label for="youtube">YouTube</label>
            <input type="text" name="youtube" value="{{fields.youtube}}" minlength="2" maxlength="50" placeholder="YouTube" value=""/>

            <label for="files" class="btn">Select Image</label>

            <label for="image">Zdjęcie</label>
            <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .gif" title="zdjecie" />
            <span class="tooltip">?
                <span class="tooltiptext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
            </span>
            
            <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            
            <label for="bio">Biografia</label>
            <textarea name="bio" cols="1500" placeholder="Biografia">{{fields.bio}}</textarea>
            <span class="tooltip">?
                <span class="tooltiptext">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
            </span>

            {# <button style="display:block;width:120px; height:30px;" onclick="document.getElementById('getFile').click()">Your text here</button>
            <input type='file' id="getFile" style="display:none"> #}

            <input type="hidden" name="dodaj" value="true" />
            <button type="submit" value="elo">Submit</button>
        </div>
    
    </form>
    
</div>
{% endblock %}