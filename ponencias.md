---
layout: page
title: Ponencias Presentadas
permalink: /ponencias/
---


<ul>
{% for ponencia in site.data.ponencias %}
  <li>
    "{{ ponencia.titulo }}" {{ ponencia.lugar }}
    <a href="/descargas/ponencias/{{ ponencia.archivo }}"><i class="icon-file-pdf"></i></a>
  </li>
{% endfor %}
</ul>