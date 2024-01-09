using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleAppContainer
{
    internal class Student : Person
    {
        private double cgpa;

        internal double Cgpa
        {
            get { return this.cgpa; }
            set
            {
                if (value >= 0 && value <= 4.0)
                    this.cgpa = value;
                else
                    this.cgpa = -1;
            }
        }

        internal override string Id
        {
            set { base.Id = value + "-S"; }
        }

        internal Student(string name, string bloodGroup, DateTime dateOfBirth, double cgpa) : base(name, bloodGroup, dateOfBirth)
        {
            this.Cgpa = cgpa;
        }

        internal override void ShowInfo()
        {
            base.ShowInfo();
            Console.WriteLine("CGPA: {0}\n", this.Cgpa);
        }

        internal override void M1()
        {
        }

        internal override void M2(string y)
        { 
        }
    }
}
