#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006

void solve()
{
    int a,b,c;
    cin >> a >> b >> c;

    int mx = max(a,max(b,c));
    
    if(a == b || a == c || b == c)
    {
        if(mx == a && (mx != b && mx != c)) 
        cout << 0 << " " << (mx-b)+1 << " " << (mx-c)+1 << endl;
        else if(mx != a && mx == b && mx != c) 
        cout << (mx-a)+1 << " " << 0 << " " << (mx-c)+1 << endl;
        else if(mx != a && mx != b && mx == c) 
        cout << (mx-a)+1 << " " << (mx-b)+1 << " " << 0 << endl;
        else 
        cout << (mx-a)+1 << " " << (mx-b)+1 << " " << (mx-c)+1 << endl;
        
    }
    else if(mx == a)
    {
        cout << 0 << " " << (mx-b)+1 << " " << (mx-c)+1 << endl;
    }else if(mx == b)
    {
        cout << (mx-a)+1 << " " << 0 << " " << (mx-c)+1 << endl;
    }else if(mx == c)
    {
        cout << (mx-a)+1 << " " << (mx-b)+1 << " " << 0 << endl;
    }
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    //solve();
}