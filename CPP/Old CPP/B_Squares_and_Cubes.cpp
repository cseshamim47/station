#include <bits/stdc++.h>
using namespace std;

#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
#define int long long
#define MAX 1000006
vector<int> s;
vector<int> q;
set<int> st;
void calc()
{
    for(int i = 1; i <= sqrt(1e9); i++)
    {
        if(i < 1001)
        {
            st.insert(powl(i,3));
        } 
        st.insert(pow(i,2));
    }
}

void solve()
{
    int n;
    cin >> n;
    auto ans = upper_bound(st.begin(),st.end(),n);

    cout << distance(st.begin(),ans) << endl;
}

int32_t main()
{
      //        Bismillah
    // BOOST
    calc();    
    w(t)
    //solve();
}