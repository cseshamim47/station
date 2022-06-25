using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppFMPro
{
    class Program
    {
        static void Main(string[] args)
        {
            //int[] s1 = new int[4] { 4, 2, 6, 8 };
            //int[] s2 = new int[9] { 2, 9, 44, 4, 2, 6, 8, 2, 1 };
            //int[] s3 = new int[3] { 5, 9, 1 };
            //Calculator c = new Calculator();
            //c.Addition(s1);

            Sample s = new Sample();
            //s.Summation(4, 2, 6, 8, 4);
            //s.Summation(4, 2, 9, 5, 6, 7, 3, 1, 5, 6, 8);
            //s.Summation(2, 9);
            //s.Summation(23, 6, 5, 4, 2, 2, 1);
            //s.Summation(s1);

            int p = 10, q = 20, r;
            s.Swap(ref p, ref q);
            Console.WriteLine("p:{0},q:{1}", p, q);

            s.M1(out r);
            s.M3(22);
            s.M4(q:5, r:6, p:7);
        }
    }
}
