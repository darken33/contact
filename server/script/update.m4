echo "Mise A Jour de Contact"
echo ""

# copie des fichiers
echo "copie des fichiers"
if [ ! -d $location/Contact ]; then
  mkdir $location/Contact
fi
if [ ! -d $location/Contact/imgs ]; then
  mkdir $location/Contact/imgs
fi
if [ ! -d $location/Contact/help ]; then
  mkdir $location/Contact/help
fi
if [ ! -d $location/Contact/help/imgs ]; then
  mkdir $location/Contact/help/imgs
fi
cp php/* $location/Contact -f
cp imgs/* $location/Contact/imgs -f
cp help/*.html $location/Contact/help -f
cp help/imgs/* $location/Contact/help/imgs -f
echo ""

# installation terminee
echo "installation terminee"
echo "veuillez vous connecter sur 'http://$hote/Contact' pour lancer le logiciel"
