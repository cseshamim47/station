using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppStruct
{
    internal struct Point // public, internal, value & refernce type, inharitance nai
    {
        public int x;
        public int y;
        
     
        public Point(int x, int y)
        {
            this.x = x;
            this.y = y;
        }

        public void PrintPoint()
        {
            Console.WriteLine("({0},{1})", this.x, this.y);
        }

    }

    internal class Program
    {
        
        static void Main(string[] args)
        {
            int p = 10, q = 20, r = 30;
            //string w = "hello";
            //Console.WriteLine(p + "" + q + "" + r);
            //printf("%d%d", p, q);
            //Console.WriteLine("p:{0},q:{1},r:{2}", p, w, r);
            //Console.WriteLine("{0}", r);

            Point p1;
            p1.x = 2;
            p1.y = 5;
            p1.PrintPoint();

            Point p2 = p1;
            p2.x++;
            p2.PrintPoint();

            Point p3 = new Point();
            //p3.x = -92;
            p3.y = 50;
            p3.PrintPoint();

            Point p4 = new Point(-95, 42);
            p4.PrintPoint();

            int a = 255;
            short b = 20;
            byte c = 30;
            c = (byte)a;
            a = b;
            Console.WriteLine("{0}", c);

        }
    }
}
