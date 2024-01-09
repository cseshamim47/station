#include <bits/stdc++.h>
using namespace std;

int main()
{
    //    Bismillah
    int n;
    cin >> n;
    set<int> st;
    int mex = 0;
    for(int i = 0; i < n; i++)
    {
        int x;
        cin >> x;
        st.insert(x);
        mex += st.count(mex);
        cout << mex << endl;
    }
}