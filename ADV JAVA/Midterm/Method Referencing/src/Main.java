import java.util.Arrays;
import java.util.List;
import java.util.Locale;
import java.util.function.Consumer;


interface Parser
{
    String parse(String str);
}

class StringParser
{
    public static String convert(String s)
    {
        if(s.length() >= 4) s = s.toLowerCase();
        else s = s.toUpperCase();

        return s;
    }
}

class MyPrinter
{
    public void print(String str, Parser p)
    {
        str = p.parse(str);
        System.out.println(str);
    }
}


public class Main {
    public static void main(String[] args) {
        /*List<String> names = Arrays.asList("shamim", "ahmed", "rabbi", "hossen");

        names.forEach(Main::print);

        Consumer<String> con = new Consumer<String>() {
            @Override
            public void accept(String s) {
                System.out.println(s);
            }
        };

        names.forEach(str->System.out.println(str));
        names.forEach(con);
        names.forEach(System.out::println);*/


        String str = "Shamim Ahmed";

        MyPrinter mp = new MyPrinter();
        mp.print(str,
                new Parser()
                {
                    public String parse(String s)
                    {
                        return StringParser.convert(s);
                    }
                }
        );

        String str0 = "AsSasdfA";
        mp.print(str0,
                new Parser()
                {
                    public String parse(String str) {
                        str = StringParser.convert(str);
                        return str;
                    }
                }
        );

        String str1 = "sha";
        mp.print(str1,s -> StringParser.convert(s));

        String str2 = "ABCD";
        mp.print(str2,StringParser::convert);

    }


    public static void print(String s)
    {
        System.out.println(s);
    }
}