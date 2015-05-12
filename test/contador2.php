<?php
class Contador
{
    private static $c = 0;

    /**
     * Incrementar contador
     *
     * @final
     * @static
     * @access  public
     * @return  int
     */
    final public static function incrementar()
    {
        return ++self::$c;
    }
}

// Crea una instancia de la clase ReflectionMethod
$metodo = new ReflectionMethod('Contador', 'incrementar');

// Muestra información básica
printf(
    "===> El método %s%s%s%s%s%s%s '%s' (que es %s)\n" .
    "     declarado en %s\n" .
    "     líneas %d a %d\n" .
    "     con los modificadores %d[%s]\n",
        $metodo->isInternal() ? 'interno' : 'definido por el usuario',
        $metodo->isAbstract() ? ' abstract' : '',
        $metodo->isFinal() ? ' final' : '',
        $metodo->isPublic() ? ' public' : '',
        $metodo->isPrivate() ? ' private' : '',
        $metodo->isProtected() ? ' protected' : '',
        $metodo->isStatic() ? ' static' : '',
        $metodo->getName(),
        $metodo->isConstructor() ? 'un constructor' : 'un método regular',
        $metodo->getFileName(),
        $metodo->getStartLine(),
        $metodo->getEndline(),
        $metodo->getModifiers(),
        implode(' ', Reflection::getModifierNames($metodo->getModifiers()))
);

// Mostrar comentarios de documentación
printf("---> Documentación:\n %s\n", var_export($metodo->getDocComment(), 1));

// Si existieran, mostrar variables estáticas
if ($statics= $metodo->getStaticVariables()) {
    printf("---> Variables estáticas: %s\n", var_export($statics, 1));
}

// Invocación del método
printf("---> Resultado de la invocación: ");
var_dump($metodo->invoke(NULL));
?>