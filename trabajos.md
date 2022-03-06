---
layout: page
title: Trabajos Publicados
permalink: /trabajos/
---


<ul>
{% for trabajo in site.data.trabajos %}
  <li>
    "{{ trabajo.titulo }}" {{ trabajo.lugar }}
    <a href="/descargas/trabajos/{{ trabajo.archivo }}"><i class="icon-file-pdf"></i></a>
  </li>
{% endfor %}
</ul>

