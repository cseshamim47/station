#include <bits/stdc++.h>
using namespace std;

vector<int> v;
int arr[3] = {3,1,2};
int k;
void f(int idx) // TC: O(n * 2^n) // SC : O(n)
{   
    if(idx == 3)
    {
        cout << ++k << " : ";
        for(auto x : v) cout << x << ' ';
        cout << endl;
        return;
    }

    v.push_back(arr[idx]);
    f(idx+1);
    v.pop_back();
    f(idx+1);

}

int main()
{
    //    Bismillah
    f(0);
}