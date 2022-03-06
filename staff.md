---
layout: page
title: Staff
permalink: /staff/
---


<ul>
{% for person in site.data.staff %}
  <li>
    {{ person.nombre }}
    <a href="/descargas/staff/{{ person.archivo }}"><i class="icon-file-pdf"></i></a>
  </li>

{% endfor %}
</ul>