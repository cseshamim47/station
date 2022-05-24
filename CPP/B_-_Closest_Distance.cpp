#include <bits/stdc++.h>
using namespace std;

#define sq(x)   ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void bruteforce()
{}


struct point{
    double x,y;
};

double dist(point a,point b)
{
    return sqrt(sq(a.x-b.x)+sq(a.y-b.y));
}

int Case;
void solve()
{
    point a,b,c,d;
    cin >> a.x >> a.y;
    cin >> b.x >> b.y;
    cin >> c.x >> c.y;
    cin >> d.x >> d.y;
    
    point lo1 = a, hi1 = b;
    point lo2 = c, hi2 = d;
    for(int i = 0; i < 50; i++)
    {
        point m1,m2,m3,m4;

        m1 = {lo1.x + (hi1.x-lo1.x)/3, lo1.y + (hi1.y - lo1.y)/3};
        m2 = {lo1.x + 2*(hi1.x-lo1.x)/3, lo1.y + 2*(hi1.y - lo1.y)/3};
        m3 = {lo2.x + (hi2.x-lo2.x)/3, lo2.y + (hi2.y - lo2.y)/3};
        m4 = {lo2.x + 2*(hi2.x-lo2.x)/3, lo2.y + 2*(hi2.y - lo2.y)/3};

        if(dist(m1,m3) < dist(m2,m4)) 
        {
            hi1 = m2;
            hi2 = m4;
        }
        else
        {
            lo1 = m1;
            lo2 = m3;
        }
    }
    printf("Case %d: %.12lf\n", ++Case,dist(lo1,lo2));
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}