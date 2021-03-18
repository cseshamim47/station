#include <iostream>
#include <vector>
#include <algorithm>

using namespace std;

int main()
{
    vector<int> v {3,2,5,1,2};
    int res = *max_element(v.begin(), v.end());

    cout << res << endl;
    
    
}