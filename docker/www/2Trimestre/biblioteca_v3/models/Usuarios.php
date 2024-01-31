<?
class Usuarios extends Model
{
    public function login($usuario, $password)
    {
        $hashedPassword = hash('sha512', $password);

        $result = $this->db->dataQuery("SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$hashedPassword'");
        return $result;
    }

    public function register($usuario, $password)
    {
        $hashedPassword = hash('sha512', $password);

        $result = $this->db->dataManipulation("INSERT INTO usuarios (usuario, password) VALUES ('$usuario', '$hashedPassword')");
        return $result;
    }

    public function getUserIdFromUsername($username)
    {
        $sql = "SELECT id FROM usuarios WHERE usuario = '$username'";
        $result = $this->db->dataQuery($sql);
    
        if (!empty($result)) {
            return $result[0]->id;
        }
    
        return null; 
    }
}