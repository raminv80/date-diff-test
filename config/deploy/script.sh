#!/bin/bash
# The deployment script runs on CircleCi VM
echo "deployment started..."
cd /home/ramin/Web/date-diff
git pull
echo "deployment finished."