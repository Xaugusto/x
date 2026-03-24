#!/bin/bash
set -e

# Iniciar Apache
exec apache2ctl -D FOREGROUND
