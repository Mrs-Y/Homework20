<!--1. Napraviti klasu Proizvod, čija su svojstva: naziv, cena, količina; metode : __construct( ? ) koja postavlja početne vrednosti, vrednost() koja vraća vrednost proizvoda (količina * cena), __toString() koja vraća string: “Proizvod ... ima cenu ... i kolicinu ...”
a. Napraviti dva objekta - proizvod_1 i proizvod_2 sa proizvoljnim podacima. Prikazati proizvod koji ima vecu vrednost.
b. Dodati svojstvo popust izraženo u procentima. Dodati settere i gettere za sva četiri svojstva.
c. Izmeniti funkciju vrednost tako da uzima i popust u obzir kada računa vrednost proizvoda (količina * (cena - cena*popust/100))
d. Promeniti __toString() tako da, ako popust postoji (popust > 0), vrati string “Proizvod ... je na akciji. Stara cena ... Nova cena ...”. 
2. Napraviti klasu BojaZaKosu koja proširuje klasu "Proizvod", tako što ima dodatni član: boja tipa string. Metoda __toString se proširuje tako sto se dodaje ", a boja je ...". Napraviti jedan objekat "BojaZaKosu".
Napraviti formu sa 5 inputa i submit inputom koja pravi
- objekat "Proizvod" ako je 5. input prazan
- objekat "BojaZaKosu" ako 5. input nije prazan.
i prikazuje rezultat funkcije __toString(). -->
<?php
class Item
{
    private $name;
    private $price;
    private $qty;
    private $sale;

    function __construct(string $name, int $price, int $qty, float $sale)
    {
        $this->name = $name;
        $this->price = $price;
        $this->qty = $qty;
        $this->sale = $sale;
    }

    function set_name($name)
    {
        $this->name = $name;
    }
    function set_price($price)
    {
        $this->price = $price;
    }
    function set_qty($qty)
    {
        $this->qty = $qty;
    }
    function set_sale($sale)
    {
        $this->sale = $sale;
    }


    function get_name()
    {
        $this->name;
    }
    function get_price()
    {
        $this->price;
    }
    function get_qty()
    {
        $this->qty;
    }
    function get_sale()
    {
        $this->sale;
    }


    function value()
    {
        return ($this->qty * ($this->price - $this->price * $this->sale / 100));
    }

    function __toString()
    {
        if ($this->sale > 0) {
            return "Name: $this->name <br />Old Price: $this->price <br>Quantity: $this->qty <br>New Price: " . $this->value();
            ".";
        }
        return "Name: $this->name <br />Price: $this->price <br />Quantity: $this->qty";
    }
}
class ColorForFurniture extends Item
{
    function __construct(string $name, int $price, int $qty, float $sale, string $color)
    {
        parent::__construct($name, $price, $qty, $sale);
        $this->color = $color;
    }
    function set_color($color)
    {
        $this->color = $color;
    }
    function get_color()
    {
        return $this->color;
    }
    function __toString()
    {
        return parent::__toString() . "<br/>Color: " . $this->color;
    }
}


$item1 = new Item("Chair", 1000, 4, 0);
$item2 = new item("Table", 5000, 4, 10);
$item3 = new ColorForFurniture("Table", 100, 1, 10, "brown");
echo $item1;
echo "<hr>";
echo $item2;
echo "<hr>";
echo $item3;
echo "<hr>";
if ($item1->value($item1) > $item2->value($item2)) {
    echo "The price of a chair is higher.";
    var_dump($item1);
} else {
    echo "The price of the table is higher.";
    var_dump($item2);
}
echo "<hr>";
echo "<hr>";

if (isset($_GET["name"]) && isset($_GET["price"]) && isset($_GET["qty"]) && isset($_GET["sale"]) && isset($_GET["color"])) {
    $name = $_GET["name"];
    $price = $_GET["price"];
    $qty = $_GET["qty"];
    $sale = $_GET["sale"];
    $color = $_GET["color"];
    if ($_GET["color"] == "") {
        $item_ = new Item($name, $price, $qty, $sale);
        var_dump($item_);
        echo "$item_";
    } else {
        $item_color = new ColorForFurniture($name, $price, $qty, $sale, $color);
        var_dump($item_color);
        echo "$item_color";
    }
} else {
    echo "Please enter valid data...";
}
?>
<hr>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./domaci20.php" method="get">
        <input type="text" name="name" placeholder="Item name"><br>
        <input type="text" name="price" placeholder="Item price"><br>
        <input type="text" name="qty" placeholder="Item qty"><br>
        <input type="text" name="sale" placeholder="Item sale"><br>
        <input type="text" name="color" placeholder="Item color"><br>
        <input type="submit" value="Send"><br>
    </form>
</body>

</html>