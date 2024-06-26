#!/bin/bash

title1="start serve"
title2="start npm run watch"
title3="start lamp"
title4="for git commands"

cmd1="php artisan serve"
cmd2="npm run watch"
cmd3="sudo /opt/lampp/lampp start"

gnome-terminal --tab --title="$title1" --command="bash -c '$cmd1; $SHELL'" \
               --tab --title="$title2" --command="bash -c '$cmd2; $SHELL'" \
               --tab --title="$title3" --command="bash -c '$cmd3; $SHELL'"
