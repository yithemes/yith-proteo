#!/bin/bash

echo 'Compiling SCSS files....';
sass ../sass/style.scss ../style.css --trace

echo 'All done!'