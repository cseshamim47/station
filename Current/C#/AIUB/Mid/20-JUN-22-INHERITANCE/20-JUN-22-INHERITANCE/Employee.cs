using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace _20_JUN_22_INHERITANCE
{
    internal class Employee : Person
    {
        private double salary;

        internal double Salary
        {
            get { return salary; }
            set
            {
                if (value >= 0) this.salary = value;
                else this.salary = -2;
            }
        }
        internal Employee(byte id, string name, DateFormat dateOfBirth, double salary) : base(id, name, dateOfBirth)
        {
            this.Salary = salary;
        }
    }
}
