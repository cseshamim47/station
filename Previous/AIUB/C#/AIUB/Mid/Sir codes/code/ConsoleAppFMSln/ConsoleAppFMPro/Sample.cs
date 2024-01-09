using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppFMPro
{
    class Sample
    {
        internal int Summation(params int[] info)
        {
            int sum = 0;
            byte count = 0;
            while (count < info.Length)
            {
                sum += info[count];
                count++;
            }
            Console.WriteLine("{0}", sum);
            return sum;
        }

        internal void Swap(ref int a, ref int b)
        {
            int t = a;
            a = b;
            b = t;
            Console.WriteLine("a:{0},b:{1}", a, b);
        }

        internal void M1(out int u)
        {
            u = 89;
        }

        internal void M2(int a, string b, ref byte f, out double w, string[] p, Calculator g, params float[] q)
        {
            w = 9.6;
        }

        internal void M3(int x = 1, int y = 2, int z = 3)
        { 
        }

        internal void M4(byte p, byte q, byte r)
        { 
        }
    }
}
