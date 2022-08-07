#include <bits/stdc++.h>
using namespace std;

#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define ll unsigned long long
#define MAX 1000006

void f()
{}

int Case;
void solve()
{
    int n;
    cin >> n;
    int arr[n+1]{0};
    int z = 0;
    int o = 0; 
    for(int i = 0; i < n; i++)
    {
        cin >> arr[i];  
        if(arr[i] == 0) z++;
        else if(arr[i] == 1) o++;
    }

    if(z && o) cout << "NO" << endl;
    else if(o == 0 || o == n) cout << "YES" << endl;
    else 
    {
        sort(arr,arr+n);
        for(int i = 0; i < n; i++)
        {
            if(arr[i] == 2) 
            {
                cout << "NO"  << endl;
                return;
            }
            if(arr[i+1]-arr[i] == 1)
            {
                cout << "NO" << endl;
                return;
            }
        }
        cout << "YES" << endl;
    }
    
    
   

   
}

int32_t main()
{
      //        Bismillah
    // BOOST
    w(t)
    // solve();
    //f();
}