import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.function.Predicate;
import java.util.stream.Stream;

public class Main {
    public static void main(String[] args) {


//        list.forEach(n-> System.out.println(n));
        // We dont want to manipulate or touch main list object as it'll be then mutable.
        // Instead we'll create a stream of that list. Which can be used only once.
        // Once it has run, it cannot be called again.

//        Stream<Integer> nums = list.stream();

        /*long cn = stream.count(); // this statement will run
        System.out.println(cn);
        stream.count(); // however, this statement will not run*/



       /* stream
                .filter(n->n%2 == 1)
                .map(n-> n*2)
                .sorted()
                .forEach(n -> System.out.println(n));*/

        List<Integer> list = Arrays.asList(5, 4, 3, 6, 1, 2);
        int sum=list.stream().filter(n->n%2 == 0).sorted().forEach(n->Sout);
                //.map(x->x*2)
                //.reduce(0,(x,y)->x+y);

        System.out.println(sum);


    }
}