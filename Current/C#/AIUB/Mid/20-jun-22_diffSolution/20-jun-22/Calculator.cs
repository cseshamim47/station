using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_jun_22
{
    internal class Calculator
    {
        //internal int addition(int a, int b)
        //{
        //    return a + b;
        //}

        internal int addition(int a, int b, int c = 0)
        {
            return a + b + c;
        }

        internal int addition(int[] a) // 1 2 3 4
        {
            int sum = 0;
            foreach(int x in a)
            {
                sum += x;
            }
            return sum;
        }
    }
}
