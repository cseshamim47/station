using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_jun_22
{
    internal class Sample
    {
        internal int summation(params int[] a)
        {
            int sum = 0;
            foreach (int element in a)
            {
                sum += element;
            }
            return sum;
        }

        internal void Swap(ref int a,ref int b)
        {
            int t = a;
            a = b;
            b = t;
            Console.WriteLine("{0}, {1}", a, b);
        }

        internal void M1(out int u)
        {
            u = 0;
        }
        
        internal void M2(int a, string b,ref byte f, out double w, string[] p, Calculator g,params float[] h)
        {
            w = 9.6;
        }

        internal void M3(int x, int y, int z = 0) // default value parameter
        {

        }

        internal void M4(byte p, byte q, byte r)
        {

        }
    }
}
