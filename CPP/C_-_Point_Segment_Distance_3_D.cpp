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
    double x,y,z;
};

double dist(point a,point b)
{
    return sqrt(sq(a.x-b.x)+sq(a.y-b.y)+sq(a.z-b.z));
}

int Case;
void solve()
{
    point a,b,p;
    cin >> a.x >> a.y >> a.z;
    cin >> b.x >> b.y >> b.z;
    cin >> p.x >> p.y >> p.z;

    point lo = a, hi = b;
    for(int i = 0; i < 50; i++)
    {
        point m1,m2;
        m1 = {lo.x + (hi.x-lo.x)/3, lo.y + (hi.y - lo.y)/3, lo.z + (hi.z-lo.z)/3};
        m2 = {lo.x + 2*(hi.x-lo.x)/3, lo.y + 2*(hi.y - lo.y)/3, lo.z + 2*(hi.z-lo.z)/3};

        if(dist(m1,p) < dist(m2,p)) hi = m2;
        else lo = m1;
    }
    printf("Case %d: %.12lf\n", ++Case,dist(lo,p));
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
    //bruteforce();
}