using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppAMPro
{
    public class Student
    {
        public const int k = 100;
        public readonly int j = 43;

        public int a;
        private int b;
        protected int c;
        internal int d;
        protected internal int e;

        public Student()
        {
            j = 70;
            j++;
        }

        public Student(int r)
        {
            j = 87;
        }

        private void M1()
        {
            
        }
    }
}
