<?php // A implémenter

class Type
{
    // Propriétés de la class Type
    private $id;
    private $name;
    private $color;

    /* Ici on créer un constructeur pour hydrater un objet dès sa création
    Ex: $type = new Type(["id] => 1, "name" => "Electrick", "color" => "Yellow"])
     */

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Ici on hydrate l'objet, cad qu'on lui apporte toutes les données dont il a besoin. Cette méthode n'est pas dans le constructeur car on peut avoir besoin d'hydrater un objet lors de sa modification.
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key); // Boucle sur les méthodes setId, setName, setColor
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */
    public function setColor(string $color)
    {
        $this->color = $color;

        return $this;
    }
}
