using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TriangleTypesZad2
{
    public partial class TriangleTypes : Form
    {
        public TriangleTypes()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            double a = Double.Parse(StA.Text);
            double b = Double.Parse(StB.Text);
            double c = Double.Parse(StC.Text);
            double p, s;

            if (a >= 1 && b >= 1 && c >= 1)
            {
                if ( (a==b && b==c ) || (a==c && c==b ) )
                {
                    p = a + b + c;
                    s = ( (a * a * Math.Sqrt(3)) / 4) ;

                   Result.Text = "Type of the triangle is Equal Triangle and " + "\n\n" + "   P= " + p +   "    S= " + s ;
                   
                }
                else if (a == b || b == c || c == a)
                {
                    p = a + b + c;
                    double P = p * (p - a) * (p - b) * (p - c);
                    s = Math.Sqrt(P);
                    Result.Text = "Type of the triangle is Isosceles triangle and " + "\n\n" + "   P= " + p + "   S= " + s;
                    
                }
                else
                {
                    p = a + b + c;
                    double P = p * (p - a) * (p - b) * (p - c);
                    s = Math.Sqrt(P);
                    Result.Text = "Type of the triangle is разностранен триъгълник and " + "\n\n" + "   P= " + p + "   S= " + s; 
                }

            }
            else MessageBox.Show ("That type of triangle doesn`t exist");
        }

        private void TriangleTypes_Load(object sender, EventArgs e)
        {

        }
    }
}
