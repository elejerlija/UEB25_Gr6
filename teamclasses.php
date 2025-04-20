<?php
class OurTeam
{
    private $name;
    protected $position;
    public $image;

    public function __construct($name, $position, $image)
    {
        $this->name = $name;
        $this->position = $position;
        $this->image = $image;
    }

   
    public function getName() { return $this->name; }
    public function getPosition() { return $this->position; }
    public function getImage() { return $this->image; }

    public function setName($name) { $this->name = $name; }
    public function setPosition($position) { $this->position = $position; }
    public function setImage($image) { $this->image = $image; }

    public function introduce() {
        return "Hi, I'm {$this->getName()}, working as {$this->getPosition()}.";
    }
}

class Developer extends OurTeam
{
    private $language;

    public function __construct($name, $image, $language)
    {
        parent::__construct($name, "Developer", $image);
        $this->language = $language;
    }

    public function getRoleInfo()
    {
        return "I code in {$this->language}.";
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }
}


class Writer extends OurTeam
{
    private $style;

    public function __construct($name, $image, $style)
    {
        parent::__construct($name, "Content Writer", $image);
        $this->style = $style;
    }

    public function getRoleInfo()
    {
        return "I write in a {$this->style} style.";
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setStyle($style)
    {
        $this->style = $style;
    }
}


class Manager extends OurTeam
{
    private $teamSize;

    public function __construct($name, $image, $teamSize)
    {
        parent::__construct($name, "Manager", $image);
        $this->teamSize = $teamSize;
    }

    public function getRoleInfo()
    {
        return "I manage a team of {$this->teamSize} people.";
    }

    public function getTeamSize()
    {
        return $this->teamSize;
    }

    public function setTeamSize($teamSize)
    {
        $this->teamSize = $teamSize;
    }
}
?>
