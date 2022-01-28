#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

// void solve() 
// {
//     int a, b, c; cin>>a>>b>>c;
//     if(2*b-c>0 && (2*b-c)%a==0) cout << "YES" << endl;
//     else if(2*b-a>0 && (2*b-a)%c==0) cout << "YES" << endl;
//     else if((a+c)%(2*b)==0) cout << "YES" << endl;
//     else if(c-b==b-a || (a==b && b==c)) cout << "YES" << endl;
//     else cout << "NO" << endl;
// }

void solve()
{
    int a,b,c;
    cin >> a >> b >> c;

    if(2*b - c > 0 && (2*b-c) % a == 0) 
    {
        cout << "YES" << endl;
    }else if(2*b-a > 0 && (2*b-a) % c == 0) 
    {
        cout << "YES" << endl;
    }else if((a+c) % (2*b) == 0) 
    {
        cout << "YES" << endl;
    }
    else if(b-a == c-b || (a == b && b == c))
    {
        cout << "YES" << endl;
    }
    else
        cout << "NO" << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}