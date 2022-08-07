#include <bits/stdc++.h>
using namespace std;

#define w(t) int t; cin >> t; while(t--){ solve(); }
#define ll long long
#define MAX 1000006

void solve()
{
    int L, Q;
    cin >> L >> Q;
    set<int> st;
    st.insert(0);
    st.insert(L);
    for(int i = 0; i < Q; i++)
    {
        int c, o;
        cin >> c >> o;
        if(c == 1) st.insert(o);
        else 
        {
            auto ub = st.upper_bound(o);
            auto lb = st.lower_bound(o);
            if(*lb != o) lb--;
            cout << *ub - *lb << endl;
           
        }
    }
}

int main()
{
      //        Bismillah
    // w(t)
    solve();
}