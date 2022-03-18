<?php
namespace noxxienl\nladdresslexer\Repositories;

class StreetsWithEndNumber
{
    /**
     * @var array<int,string> $streets
     */
    protected static $streets = [
        'Plein \'40-\'45',
        'Buurt 1',
        'Rijksweg A9',
        'Laan 1940 1945',
        'Plein 1945',
        'Plein 2000',
        'Weg 1940-1945',
        'Plein 1940 1945',
        'Rijksweg A7',
        'Plein 13',
        'Verzetstraat 1940-1945',
        'Rijksweg A4',
        'Rijksweg A44',
        'Plein 1957',
        'Rijksweg 11',
        'Rijksweg A12',
        'Plein 1813',
        'Rijksweg A13',
        'Rijksweg A20',
        'Rijksweg A15',
        'Rijksweg A16',
        'Plein 1953',
        'Plein 1940',
        'Rijksweg A29',
        'Rijksweg A27',
        'Rijksweg A2',
        'Laan 1954',
        'Laan 1813',
        'Laan 1914',
        'Rijksweg A1',
        'Rijksweg A28',
        'Laan 1940 - 1945',
        'Plein 1923',
        'Laan 1940-1945',
        'Statenhove 1',
        'Wijdaudwarsstraat 1',
        'Wijdaudwarsstraat 2',
        'Rijksweg 60',
        'Rijksweg A58',
        'Plein 40-45',
        'Plein 1 feb 1953',
        'Rijksweg A59',
        'Plein 1803',
        'Rijksweg-A58',
        'Singel 1940 1945',
        'Rijksweg N321',
        'Plein 1969',
        'Plein 1944',
        'Rijksweg A67/E34',
        'Rijksweg E3',
        'Rijksweg A50',
        'Rijksweg A67',
        'Laan 1944',
        'Brand 1786',
        'Rijksweg-A67',
        'Autoweg A2',
        'Plein 1992',
        'Autoweg A76',
        'Laan 1945',
        'Provincialeweg A325',
        'Rijksweg A52',
        'Laan 1933',
        'Laan 1948',
        'Rijksweg A30',
        'Plein 1946',
        'Rijksweg A18',
        'Gysbertplein 1344',
        'Plein 1940-1945',
        'Boulevard 1945',
        'Rijksweg A35',
        'Plein 1918',
        'Laan 40-45',
        'Rijksweg 36',
        'Rijksweg N34',
        'Laan 1917',
        'Rijksweg 32',
        'Rijksweg N50',
        'Rijksweg A6',
        'Wijk 1',
        'Wijk 2',
        'Wijk 3',
        'Wijk 4',
        'Wijk 5',
        'Wijk 7',
        'Wijk 8',
        'Wijk 6',
        'Rijksweg A32',
        'Plein 1455',
        'Rijksweg E10',
        'Rijksweg N31',
        'Langeloerduinen 1',
        'Langeloerduinen 2',
        'Langeloerduinen 3',
        'Langeloerduinen 4',
        'Langeloerduinen 5',
        'Ruiten A Kanaal West 1',
        'Ruiten A Kanaal Oost 3',
        'Ruiten A Kanaal Oost 5',
        'Ruiten A Kanaal West 5',
        'Dalweg 12',
        'Laan 1509',
        'Rijksweg Nr 42',
        'Plein 1945-1995',
        'Plein 1971',
        'Provincialeweg N205',
        'Provinciale weg N206',
        'Plein 1 febr 1953',
        'Singel 1940-1945',
        'Antwerpseweg - N281',
        'Gijsbertplein 1344',
        'Laan 1940-\'45',
        'Laan \'40-\'45',
        'Rijksweg 59',
        'Punter 35',
        'Punter 39',
        'Markerkant 12',
        'Markerkant 13',
        'Markerkant 14',
        'Markerkant 15',
        'Randstad 20',
        'Randstad 21',
        'Randstad 23',
        'Markerkant 10',
        'Markerkant 11',
        'Markerkant 16',
        'Randstad 22',
        'Sluis 1',
        'Sluis 2',
        'Ringweg Z / Rijksweg A20',
        'Zonegge 01',
        'Zonegge 02',
        'Zonegge 03',
        'Zonegge 04',
        'Zonegge 05',
        'Zonegge 06',
        'Zonegge 07',
        'Zonegge 08',
        'Zonegge 09',
        'Zonegge 10',
        'Zonegge 11',
        'Zonegge 12',
        'Zonegge 13',
        'Zonegge 14',
        'Zonegge 15',
        'Zonegge 16',
        'Zonegge 17',
        'Zonegge 18',
        'Zonegge 19',
        'Zonegge 20',
        'Zonegge 21',
        'Zonegge 22',
        'Zonegge 23',
        'Zonegge 24',
        'Rozengaard 11',
        'Rozengaard 12',
        'Rozengaard 13',
        'Rozengaard 14',
        'Rozengaard 15',
        'Rozengaard 16',
        'Rozengaard 17',
        'Rozengaard 18',
        'Rozengaard 19',
        'Archipel 13',
        'Archipel 21',
        'Archipel 15',
        'Archipel 16',
        'Archipel 17',
        'Archipel 22',
        'Archipel 23',
        'Archipel 25',
        'Archipel 26',
        'Archipel 11',
        'Archipel 30',
        'Archipel 31',
        'Archipel 32',
        'Archipel 33',
        'Archipel 34',
        'Archipel 35',
        'Archipel 36',
        'Archipel 37',
        'Archipel 40',
        'Archipel 41',
        'Archipel 42',
        'Archipel 44',
        'Archipel 45',
        'Archipel 46',
        'Wold 10',
        'Wold 11',
        'Wold 16',
        'Wold 15',
        'Wold 17',
        'Wold 18',
        'Wold 19',
        'Wold 20',
        'Wold 21',
        'Wold 22',
        'Wold 23',
        'Wold 24',
        'Wold 25',
        'Wold 26',
        'Wold 27',
        'Wold 28',
        'Wold 13',
        'Wold 14',
        'Wold 12',
        'Kamp 11',
        'Kamp 15',
        'Kamp 12',
        'Kamp 16',
        'Kamp 17',
        'Kamp 18',
        'Kamp 19',
        'Kamp 20',
        'Kamp 21',
        'Kamp 22',
        'Kamp 23',
        'Kamp 26',
        'Kamp 27',
        'Kamp 13',
        'Kamp 14',
        'Kamp 10',
        'Kamp 28',
        'Kamp 29',
        'Kamp 30',
        'Kamp 31',
        'Kamp 32',
        'Kamp 39',
        'Kamp 33',
        'Kamp 34',
        'Kamp 40',
        'Kamp 41',
        'Kamp 42',
        'Kamp 43',
        'Zoom 10',
        'Zoom 11',
        'Zoom 12',
        'Zoom 13',
        'Zoom 14',
        'Zoom 15',
        'Zoom 16',
        'Zoom 17',
        'Zoom 18',
        'Zoom 19',
        'Zoom 20',
        'Horst 11',
        'Horst 12',
        'Horst 13',
        'Horst 14',
        'Horst 15',
        'Horst 16',
        'Horst 10',
        'Horst 18',
        'Horst 19',
        'Horst 20',
        'Horst 22',
        'Horst 23',
        'Horst 25',
        'Horst 28',
        'Horst 27',
        'Horst 29',
        'Horst 31',
        'Horst 32',
        'Horst 33',
        'Horst 34',
        'Horst 30',
        'Horst 38',
        'Horst 35',
        'Horst 36',
        'Horst 37',
        'Horst 26',
        'Griend 22',
        'Griend 20',
        'Griend 15',
        'Griend 16',
        'Griend 17',
        'Griend 18',
        'Griend 19',
        'Griend 21',
        'Griend 23',
        'Griend 24',
        'Griend 25',
        'Griend 31',
        'Griend 30',
        'Griend 32',
        'Griend 33',
        'Griend 34',
        'Griend 35',
        'Griend 36',
        'Griend 37',
        'Griend 39',
        'Griend 40',
        'Griend 38',
        'Griend 41',
        'Griend 50',
        'Griend 14',
        'Griend 10',
        'Griend 11',
        'Griend 12',
        'Karveel 04',
        'Karveel 05',
        'Karveel 06',
        'Karveel 07',
        'Karveel 10',
        'Karveel 12',
        'Karveel 13',
        'Karveel 15',
        'Karveel 20',
        'Karveel 22',
        'Karveel 33',
        'Karveel 35',
        'Karveel 34',
        'Karveel 36',
        'Karveel 37',
        'Karveel 38',
        'Kempenaar 23',
        'Kempenaar 25',
        'Kempenaar 26',
        'Kempenaar 27',
        'Kempenaar 28',
        'Kempenaar 29',
        'Kempenaar 30',
        'Kempenaar 31',
        'Kempenaar 33',
        'Karveel 40',
        'Karveel 39',
        'Karveel 43',
        'Karveel 44',
        'Karveel 42',
        'Kempenaar 05',
        'Kempenaar 07',
        'Kempenaar 15',
        'Kempenaar 16',
        'Kempenaar 17',
        'Kempenaar 18',
        'Kempenaar 19',
        'Kempenaar 20',
        'Kempenaar 21',
        'Kempenaar 22',
        'Kempenaar 24',
        'De Veste 10',
        'De Veste 11',
        'De Veste 13',
        'De Veste 15',
        'De Veste 16',
        'De Veste 17',
        'De Veste 18',
        'De Schans 18',
        'De Schans 19',
        'De Schans 17',
        'De Schans 10',
        'De Schans 16',
        'De Schans 15',
        'De Schans 14',
        'Kempenaar 06',
        'Kempenaar 09',
        'Kempenaar 10',
        'Kempenaar 11',
        'Kempenaar 12',
        'Kempenaar 13',
        'Kempenaar 14',
        'Schouw 38',
        'Schouw 39',
        'Schouw 40',
        'Schouw 41',
        'Schouw 42',
        'Schouw 44',
        'Schouw 45',
        'Schouw 46',
        'Schouw 48',
        'Schouw 24',
        'Schouw 35',
        'Schouw 37',
        'De Stelling 10',
        'De Stelling 11',
        'De Stelling 12',
        'De Stelling 13',
        'De Stelling 14',
        'De Stelling 15',
        'Schouw 19',
        'Botter 12',
        'Botter 13',
        'Botter 19',
        'Botter 18',
        'Botter 17',
        'Botter 11',
        'Botter 14',
        'Botter 15',
        'Botter 20',
        'Botter 24',
        'Botter 26',
        'Botter 29',
        'Botter 28',
        'Botter 27',
        'Botter 25',
        'Botter 23',
        'Botter 21',
        'Botter 22',
        'Tjalk 10',
        'Tjalk 11',
        'Tjalk 12',
        'Tjalk 13',
        'Tjalk 14',
        'Tjalk 15',
        'Tjalk 17',
        'Tjalk 18',
        'Tjalk 19',
        'Tjalk 23',
        'Tjalk 28',
        'Tjalk 29',
        'Tjalk 34',
        'Tjalk 24',
        'Tjalk 22',
        'Tjalk 25',
        'Tjalk 33',
        'Tjalk 39',
        'Tjalk 38',
        'Tjalk 37',
        'Tjalk 35',
        'Tjalk 36',
        'Tjalk 41',
        'Tjalk 42',
        'Tjalk 31',
        'Tjalk 32',
        'Tjalk 30',
        'Schouw 49',
        'Schouw 50',
        'Schouw 51',
        'Schouw 52',
        'Schouw 53',
        'Schouw 54',
        'Schouw 12',
        'Schouw 13',
        'Schouw 14',
        'Schouw 15',
        'Schouw 16',
        'Schouw 17',
        'Grietenij 16',
        'Grietenij 11',
        'Grietenij 12',
        'Grietenij 17',
        'Grietenij 15',
        'Grietenij 22',
        'De Doelen 10',
        'Kogge 08',
        'Kogge 09',
        'Kogge 01',
        'Kogge 02',
        'Kogge 03',
        'Kogge 04',
        'Kogge 05',
        'Kogge 06',
        'Kogge 07',
        'Kempenaar 01',
        'Kempenaar 02',
        'Kempenaar 03',
        'Kempenaar 04',
        'Boeier 01',
        'Boeier 02',
        'Boeier 03',
        'Boeier 04',
        'Karveel 56',
        'Karveel 57',
        'Punter 12',
        'Punter 15',
        'Punter 13',
        'Punter 11',
        'Punter 10',
        'Punter 14',
        'Punter 16',
        'Punter 17',
        'Punter 18',
        'Punter 19',
        'Punter 20',
        'Punter 21',
        'Punter 22',
        'Punter 23',
        'Punter 24',
        'Punter 25',
        'Punter 26',
        'Punter 29',
        'Punter 31',
        'Punter 27',
        'Punter 32',
        'Punter 30',
        'Punter 36',
        'Punter 33',
        'Punter 34',
        'Punter 37',
        'Punter 40',
        'Punter 41',
        'Punter 44',
        'Punter 46',
        'Punter 47',
        'Punter 48',
        'Punter 45',
        'Punter 49',
        'Oostvaardersdijk 01',
        'Karveel 45',
        'Karveel 46',
        'Karveel 47',
        'Karveel 48',
        'Karveel 49',
        'Karveel 58',
        'Karveel 59',
        'Karveel 60',
        'Karveel 50',
        'Karveel 51',
        'Karveel 52',
        'Karveel 53',
        'Karveel 54',
        'Karveel 55',
        'Kogge 10',
        'Kogge 11',
        'Kogge 12',
        'Gondel 10',
        'Gondel 12',
        'Gondel 11',
        'Gondel 13',
        'Gondel 14',
        'Gondel 15',
        'Gondel 16',
        'Gondel 17',
        'Gondel 19',
        'Gondel 18',
        'Gondel 22',
        'Gondel 21',
        'Gondel 23',
        'Gondel 24',
        'Gondel 25',
        'Gondel 26',
        'Gondel 27',
        'Gondel 28',
        'Gondel 29',
        'Gondel 30',
        'Gondel 31',
        'Gondel 32',
        'Gondel 33',
        'Gondel 34',
        'Gondel 35',
        'Gondel 36',
        'Jol 12',
        'Jol 16',
        'Jol 10',
        'Jol 11',
        'Jol 13',
        'Jol 14',
        'Jol 15',
        'Jol 19',
        'Jol 17',
        'Jol 18',
        'Jol 20',
        'Jol 21',
        'Jol 22',
        'Jol 23',
        'Jol 24',
        'Jol 25',
        'Jol 26',
        'Jol 27',
        'Jol 28',
        'Jol 29',
        'Jol 30',
        'Jol 31',
        'Jol 32',
        'Jol 33',
        'Jol 34',
        'Jol 35',
        'Jol 38',
        'Jol 39',
        'Jol 40',
        'Jol 41',
        'Jol 37',
        'Botter 42',
        'Botter 43',
        'Botter 44',
        'Botter 39',
        'Botter 38',
        'Botter 37',
        'Botter 35',
        'Botter 31',
        'Botter 32',
        'Botter 33',
        'Botter 34',
        'Botter 36',
        'Botter 40',
        'Botter 41',
        'Galjoen 29',
        'Galjoen 30',
        'Galjoen 27',
        'Galjoen 28',
        'Galjoen 25',
        'Galjoen 26',
        'Galjoen 20',
        'Galjoen 22',
        'Galjoen 24',
        'Galjoen 23',
        'Galjoen 21',
        'Galjoen 19',
        'Galjoen 14',
        'Galjoen 13',
        'Galjoen 10',
        'Galjoen 01',
        'Galjoen 11',
        'Galjoen 08',
        'Galjoen 06',
        'Galjoen 16',
        'Galjoen 15',
        'Galjoen 02',
        'Galjoen 03',
        'Galjoen 04',
        'Galjoen 05',
        'Galjoen 07',
        'Galjoen 09',
        'Schoener 10',
        'Schoener 11',
        'Schoener 12',
        'Schoener 13',
        'Schoener 14',
        'Schoener 15',
        'Schoener 16',
        'Schoener 17',
        'Schoener 18',
        'Schoener 26',
        'Schoener 27',
        'Schoener 28',
        'Schoener 29',
        'Schoener 30',
        'Schoener 42',
        'Schoener 43',
        'Schoener 31',
        'Schoener 32',
        'Schoener 33',
        'Schoener 34',
        'Schoener 35',
        'Schoener 36',
        'Schoener 41',
        'Schoener 40',
        'Schoener 45',
        'Schoener 44',
        'Schoener 46',
        'Schoener 47',
        'Schoener 48',
        'Schoener 49',
        'Schoener 50',
        'Kempenaar 08',
        'Plein 1799',
        'Tijdelijke straat 13',
        'Tijdelijke straat 14',
        'Ruiten A Kanaal West 3',
        'Windturbinepad A27',
        'Provinciale weg N216',
        'Provincialeweg N214',
        'Plein 983',
        'N434',
        'Rijksweg A17',
        'Schouw 55',
        'De Veste 12',
        'Windmolenpad A27',
        'Rijksweg N11',
        'Rijksweg 24'
    ];

    /**
     * Returns if the given streetname is a street with a number on the end.
     *
     * @param string $value
     * @return boolean
     */
    public static function is(string $value) : bool
    {
        return in_array(strtolower($value), self::$streets);
    }
}
