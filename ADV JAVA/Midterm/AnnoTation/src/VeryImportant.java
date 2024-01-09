import java.lang.annotation.ElementType;
import java.lang.annotation.Retention;
import java.lang.annotation.RetentionPolicy;
import java.lang.annotation.Target;

@Target({ElementType.TYPE, ElementType.METHOD}) // TYPE - Class, METHOD - method
@Retention(RetentionPolicy.RUNTIME)
public @interface VeryImportant {

}
