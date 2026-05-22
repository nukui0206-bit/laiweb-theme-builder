<?php
if ($gPages['slug']) {
  get_template_part('single-' . $gPages['slug']);
} else {
  get_template_part('single-def');
}
